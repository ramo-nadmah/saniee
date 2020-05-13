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


class AdminController extends Controller
{
    public function showRegisterForm()
    {
        return view('admin_registration');
    }
    public function register(Request $request)
    {
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
            if ($request->id == -1) {
                $user=User::all();
                $user->favorites->delete();
                $user->followings->delete();
                User::truncate();

                return redirect("/admin");
            } else {
                $user=User::where('id', '=', $request->id);
                $user->followings->delete();
                $user->favorites->delete();
                $user->delete();
            }
        }elseif($request->flag=='y')
        {
            if ($request->id == -1) {
                category::truncate();
                Shop::truncate();
                Follower::truncate();
                Post::tuncate();
                Favorite::truncate();
                Image::truncate();
                return redirect("/admin");
            } else {
                $category=Category::where('id', '=', $request->id);
                $category->shops->delete();
                Follower::where('follow_id','=',Shop::where('category_id','=',$request->id)->value('id'))->orWhere('shop_id',shop::where('category_id','=',$request->id)->value('id'))->delete();
                $category->posts->delete();
                $category->posts->favorites->delete();
                $category->posts->images->delete();
                $category->delete();
                }
        }
        else if($request->flag=='z')
        {
            if ($request->id == -1) {
                Shop::truncate();
                Follower::truncate();
                Favorite::trucate();
                Post::truncate();
                Image::truncate();
                return redirect("/admin");
            } else {
                $shop=Shop::where('id', '=', $request->id);
                $shop->posts->delete();
                $shop->posts->favorites->delete();
                Follower::where('follow_id','=',$shop->value('id'))->orWhere('shop_id',$shop->value('id'))->delete();
                $shop->posts->images->delete();
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
            $user = new User();
            if (User::where('email', '=', $request->email)->exists()) {
                $user->update(
                    ['password' => Hash::make($request->password), 'name' => $request->name, 'email' => $request->email,
                        'updated_at' => date('Y-m-d H:i:s')]
                );
            } else {
                $user->name=$request->name;
                $user->email=$request->email;
                $user->password= Hash::make($request->password);
                $user->save();
            }


            return redirect("/admin");
        } elseif($flag=='y')
        {
            if($request->hasFile('image')) {
                $category = new Category();
                if (Category::where('name', '=', $request->name)->exists()) {
                    $image = $request->file('image');
                    $name = md5(time() . rand(0, 10000)) . '.' . $image->getClientOriginalExtension();
                    $destinationPath = public_path('/images');
                    $image->move($destinationPath, $name);

                    $category->update(
                        [
                            'name' => $request->name, 'updated_at' => date('Y-m-d H:i:s'),
                            'logo' => $name
                        ]
                    );
                } else {
                    $category->name = $request->name;
                    $image = $request->file('image');
                    $name = md5(time() . rand(0, 10000)) . '.' . $image->getClientOriginalExtension();
                    $destinationPath = public_path('/images');
                    $image->move($destinationPath, $name);
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
            $shop = new Shop();
            if (Shop::where('email', '=', $request->email)->exists()) {
                $shop->update(
                    ['password' => Hash::make($request->password), 'name' => $request->name, 'email' => $request->email,
                        'updated_at' => date('Y-m-d H:i:s')]
                );
            } else {
                $shop->name=$request->name;
                $shop->email=$request->email;
                $shop->password= Hash::make($request->password);
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
