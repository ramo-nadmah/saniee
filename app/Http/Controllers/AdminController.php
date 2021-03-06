<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Category;
use App\Favorite;
use App\Follower;
use App\Image;
use App\Post;
use App\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Member;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class AdminController extends Controller
{
    public function showRegisterForm()
    {
        return view('admin_registration');
    }
    public function register(Request $request)
    {
        $validateData=$request->validate
        (
            [
                'email'=>'required|unique:admins',
                'password'=>'required',
                'name'=>'required|max:15'



            ]
        );

        $admin = new Admin();
        $admin->email = $request->email;
        $admin->name = $request->name;
        $admin->password = Hash::make($request->password);
        $admin->save();
        return redirect('login_admin');
    }
    public function showLoginForm()
    {
        return view('admin_login');
    }
    public function login(Request $request)
    {
        $validateData=$request->validate
        (
            [
                'email'=>'required|exists:admins',
                'password'=>'required',



            ]
        );

        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            // Authentication passed...


            return redirect("/admin");
        } else {
            return redirect("/login_admin");
        }

    }

    public function main()
    {

        $users=User::all();
        $categories=Category::all();
        $shops=Shop::all();

        return view('/admin',compact(['users', 'categories','shops']));

    }
    public function deleter(Request $request)
    {
        if($request->flag=='x') {
            if ($request->id == '-1') {
//                $user=User::all();
                Favorite::where('user_id',$request->id)->delete();
                Follower::where('user_id',$request->id)->delete();
//                $user->favorites->delete();
//                $user->followings->delete();
                User::truncate();

                return redirect("/admin");
            } else {

                $user=User::find($request->id);
                Follower::where('user_id',$request->id)->delete();
                Favorite::where('user_id',$request->id)->delete();
//
////                $user->followings->delete();
////                $user->favorites->delete();
                $user->delete();
            }
        }elseif($request->flag=='y')
        {
            if ($request->id == '-1') {
                category::truncate();
                Shop::truncate();
                Follower::truncate();
                Post::tuncate();
                Favorite::truncate();
                Image::truncate();
                return response('/admin');
            } else {

                $category=Category::find($request->id);
                Shop::where('category_id',$request->id)->delete();
                $posts=Post::where('category_id',$request->id)->value('id');
                Favorite::where('post_id',$posts)->delete();
                Image::where('post_id',$posts)->delete();

                Follower::where('follow_id',Shop::where('category_id','=',$request->id)->value('id'))->orWhere('shop_id',shop::where('category_id',$request->id)->value('id'))->delete();
                Post::where('category_id',$request->id)->delete();
//              $category->shops->delete();
//              $category->posts->delete();
//              $category->posts->favorites->delete();
//              $category->posts->images->delete();
//                $posts->delete();


                $category->delete();
            }

        }
        else if($request->flag=='z')
        {
            if ($request->id == '-1') {
                Shop::truncate();
                Follower::truncate();
                Favorite::trucate();
                Post::truncate();
                Image::truncate();
                return redirect("/admin");
            } else {
                $shop=Shop::find($request->id);
                $posts=Post::where('shop_id',$request->id)->value('id');
                Favorite::where('post_id',$posts)->delete();
                Image::where('post_id',$posts)->delete();
                Follower::where('follow_id',$shop->value('id'))->orWhere('shop_id',$shop->value('id'))->delete();


//                $shop->posts->delete();
//                $shop->posts->favorites->delete();
//                $shop->posts->images->delete();

//                $posts->delete();
                Post::where('shop_id',$request->id)->delete();
                $shop->delete();
            }
        }
    }


//    adder function addes and updates
    public function adder(request $request,$flag)
    {
//            ->updateOrInsert(
//        ['email' => 'john@example.com', 'name' => 'John'],
//        ['votes' => '2']
////    );
//        $user->name=$request->name;
//        $user->email=$request->email;
//        $user->password= Hash::make($request->password);
//        $user->save();
        if($flag=='x')
        {
            $validateUserData=$request->validate
            (
                [
                    'email'=>'required',
                    'password'=>'required|min:8',
                    'name'=>'required|max:20',
                    'logo'=>"/static_images/download.jpg"


                ]
            );
            $user = new User();
            if (User::where('email', '=', $request->email)->exists())
            {
                User::where('email', '=', $request->email)->update
                (
                    ['password' => Hash::make($request->password),
                        'name' => $request->name, 'email' => $request->email,
                        'updated_at' => date('Y-m-d H:i:s')
                    ]
                );
            } else {
                $user->name=$request->name;
                $user->email=$request->email;
                $user->password= Hash::make($request->password);
                $user->save();
            }


            return redirect("/admin");
        }
        elseif($flag=='y')
        {
            if($request->hasFile('image')) {
                $category = new Category();
                if (Category::where('name', '=', $request->name)->exists()) {

//                    ------------------------------------- S3 storage
                    $path=$request->file('image')->store('images','s3');
                    Storage::disk('s3')->setVisibility($path,'public');
                    $name=Storage::disk('s3')->url($path);



//                    =========================== S3 Storage



                    Category::where('name', '=', $request->name)->update(
                        [
                            'name' => $request->name,
                            'updated_at' => date('Y-m-d H:i:s'),
                            'logo' => $name
                        ]
                    );
                } else {
                    $category->name = $request->name;
//============================ S3 storage
                    $path=$request->file('image')->store('images','s3');
                    Storage::disk('s3')->setVisibility($path,'public');
                    $name=Storage::disk('s3')->url($path);
//                    =====================================================
                    $category->logo = $name;
                    $category->save();
                }


                return redirect("/admin");
            }else
            {
                return redirect()->back()->with('error', 'Please Select Images');
            }
        } elseif($flag=='z')
        {
            $validateShopData=$request->validate
            (
                [
                    'shopEmail'=>'required',
                    'shopPassword'=>'required|min:8',
                    'shopName'=>'required|max:35'

                ]
            );
            $shop = new Shop();
            $category=new Category();

            if (Shop::where('email',  $request->shopEmail)->exists()) {
                Shop::where('email',  $request->shopEmail)->update(
                    [
                        'password' => Hash::make($request->shopPassword),
                        'name' => $request->shopName,
                        'email' => $request->shopEmail,
                        'updated_at' => date('Y-m-d H:i:s'),
                        'category_id'=>$category->first()->value('id'),
                        'logo'=>"/static_images/download.jpg"
                    ]
                );

            } else {
                $shop->name=$request->shopName;
                $shop->email=$request->shopEmail;
                $shop->password= Hash::make($request->shopPassword);
                $shop->category_id=$category->first()->value('id');
                $shop->logo="/static_images/download.jpg";
                $shop->save();

            }


            return redirect("/admin");
        }






    }

    //5alenaha logut 3asahn lama admin y3ml logout b6la3 mn kol 2shy it extends the logout from the authnticate users
    public function logout()
    {
        Auth::guard('admin')->logout();



        return redirect('/admin');
    }

}
