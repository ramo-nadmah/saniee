<?php

namespace App\Http\Controllers;
use App\Category;
use App\Favorite;
use App\Follower;
use App\Image;
use App\Post;
use App\Shop;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function shopOtherProfile($id)
    {
        $shop=Shop::find($id);
        $posts=Post::all()->where('shop_id','=',$id);
        $post_number=Post::all()->where('shop_id','=',$id)->count();
        $favorite_number=Favorite::all()->where('shop_id','=',$id)->count();
        $follow_number=Follower::all()->where('follow_id','=',$id)->count();

        return view('shopOtherProfile',compact(['shop','posts','post_number','favorite_number','follow_number']));
    }
    //
    public function shopMyProfile($id,$flag)
    {
        $shop=Shop::find($id);
        $posts=Post::all()->where('shop_id','=',$id);
        $favorites=Favorite::all()->where('shop_id','=',$id);
        $followings=Follower::all()->where('shop_id','=',$id);
        $categories=Category::all();
        $post_number=Post::all()->where('shop_id','=',$id)->count();
        $favorite_number=Favorite::all()->where('shop_id','=',$id)->count();
        $follow_number=Follower::all()->where('follow_id','=',$id)->count();
        return view('shopMyProfile',compact(['flag','categories','shop','posts','favorites','followings','post_number','favorite_number','follow_number']));

    }

    public function edit(Request $request)
    {

       // axios.get("editMyProfile?shop_id="+shop_id+"&description="+paragraphH.innerText+"&name="+title.innerHTML+"&phone="+call_btn.innerHTML+"&address="+selec_val+"&category="+selec_val2)


        Shop::where('id',$request->shop_id)->update
        (
            [
//              'price'=>$request->price,
                'name'=>$request->name,
                'phone'=>$request->phone,
                'description'=>$request->description,
                'address'=>$request->address,
                'category_id'=>$request->category
            ]
        );

    }
    public function deletePP(Request $request)
    {
        Post::find($request->post_id)->delete();
        Image::where('post_id',$request->post_id)->delete();
    }
    Public function deletePFa(Request $request)
    {
        Favorite::find($request->favorite_id)->delete();

    }

    Public function deletePFo(Request $request)
    {
        Follower::find($request->following_id)->delete();

    }
    public function changePP(Request $request,$id)
    {
        if($request->hasFile('image')) {
        $image = $request->file('image');
        $name = md5(time() . rand(0, 10000)) . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $name);
        Shop::where('id',$id)->update(['logo'=>$name]);

        return redirect()->back();

        }
        else
            return redirect()->back()->with('error', 'Please Select Images');



    }
    public function deletePPhoto(Request $request)
    {
        Shop::where('id',$request->shop_id)->update(['logo'=>"download.jpg"]);
    }

////////////////////////////////////////////////////////////////////////////////////////////

    //
    public function userMyProfile($id,$flag)
    {
        $user=User::find($id);

        $favorites=Favorite::all()->where('user_id','=',$id);
        $followings=Follower::all()->where('user_id','=',$id);
        $categories=Category::all();

        $favorite_number=Favorite::all()->where('user_id','=',$id)->count();
        $follow_number=Follower::all()->where('user_id','=',$id)->count();
        return view('userMyProfile',compact(['flag','categories','user','favorites','followings','favorite_number','follow_number']));

    }
    public function deleteUserPPhoto(Request $request)
    {
        User::where('id',$request->user_id)->update(['logo'=>"download.jpg"]);
    }

    public function userEdit(Request $request)
    {
        User::where('id',$request->user_id)->update
        (
            [

                'name'=>$request->name,

            ]
        );

    }

    public function changeUserPP(Request $request,$id)
    {
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $name = md5(time() . rand(0, 10000)) . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            User::where('id',$id)->update(['logo'=>$name]);

            return redirect()->back();

        }
        else
            return redirect()->back()->with('error', 'Please Select Images');



    }
    Public function deleteUserPFa(Request $request)
    {
        Favorite::find($request->favorite_id)->delete();

    }

    Public function deleteUserPFo(Request $request)
    {
        Follower::find($request->following_id)->delete();

    }
}
