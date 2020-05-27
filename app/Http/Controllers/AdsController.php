<?php

namespace App\Http\Controllers;

use App\Category;
use App\Favorite;
use App\Follower;
use App\Image;
use App\Shop;
use Illuminate\Support\Facades\DB;
use App\Post;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlockFactory;
use Illuminate\Support\Collection;

class AdsController extends Controller
{
    //
    public function showShop($id)
    {
        $shops=Shop::all()->where('category_id','=',$id);
        $categories=Category::all();

        $name=Category::find($id)->name;
        $cat_shop_num=Shop::all()->where('category_id','=',$id)->count();


//        dd(Post::find(2)->images->get());


        return view("listings",compact(['shops','name','categories','cat_shop_num']));
    }



    public function show($id)
    {
        $post=Post::find($id);
        $images=Image::all()->where('post_id','=',$id);
//        dd(Post::find(7)->images);
        return view('single',compact(['post','images']));
    }

    public function addPost(){

        return view("add-ad");
    }

    public function handleAddPost(Request $request){
        echo $request->number;
        $this->validate($request,[

        ]);
        if($request->hasFile('image')) {


            $post = Post::create([

                'body'=>$request->body,
                'name'=>$request->name,
                'phone'=>$request->number,
                'category_id'=>$request->category,
                'shop_id'=>$request->shop_id,
                'slogan'=>$request->slogan,
                'price'=>$request->price
            ]);


            $image_arr=$request->file('image');
            $arr_len=count($image_arr);
            for($i=0;$i<$arr_len;$i++)
            {
                $pic=new Image();

                $name = '/images/'.md5(time() . rand(0, 10000)) . '.' . $image_arr[$i]->getClientOriginalExtension();
                $destinationPath = public_path('/images');
                $image_arr[$i]->move($destinationPath, $name);
                $pic->image = $name;
                $pic->post_id=$post->id;
                $pic->save();
            }

            $post->save();

            return redirect("/");
        }
        else
            return redirect()->back()->with('error', 'Please Select Images');;
    }

    public function is_followed(Request $request)
    {
        if($request->flag =='1')
        {
            $x=Follower::where('user_id',$request->follower_id)->where('follow_id',$request->followed_id)->count();
            return response($x);
        }

        if($request->flag =='2')
        {
            $x=Follower::where('shop_id',$request->follower_id)->where('follow_id',$request->followed_id)->count();
            return response($x);
        }
    }



    public function follow(Request $request)
    {
        if($request->flag =='1')

        {
            $follow = new Follower();
            $follow->user_id=$request->follower_id;
            $follow->follow_id=$request->followed_id;
            $follow->save();


        }
        if($request->flag =='2')
        {
            $follow = new Follower();
            $follow->shop_id=$request->follower_id;

            $follow->follow_id=$request->followed_id;
            $follow->save();
        }



    }

    public function unfollow(Request $request)
    {

        if($request->flag ==1)
        Follower::where('user_id', '=', $request->follower_id)->where('follow_id', '=', $request->followed_id)->delete();
        if($request->flag ==2)
        Follower::where('shop_id', '=', $request->follower_id)->where('follow_id', '=', $request->followed_id)->delete();
    }


    public function is_favorite(Request $request)
    {
        if($request->flag =='1')
        {
            $x=Favorite::where('user_id',$request->liker_id)->where('post_id',$request->post_id)->count();
            return response($x);
        }
        if($request->flag =='2')
        {
            $x=Favorite::where('shop_id',$request->liker_id)->where('post_id',$request->post_id)->count();
            return response($x);
        }

    }
    public function favorite(Request $request)
    {
        if($request->flag =='1')
        {
            $favorite=new Favorite();
            $favorite->user_id=$request->liker_id;
            $favorite->post_id=$request->liked_id;
            $favorite->save();
        }
        if($request->flag =='2')
        {
            $favorite=new Favorite();
            $favorite->shop_id=$request->liker_id;
            $favorite->post_id=$request->liked_id;
            $favorite->save();
        }
    }
    public function unfavorite(Request $request)
    {
        if($request->flag ==1)
            Favorite::where('user_id', '=', $request->liker_id)->where('post_id', '=', $request->liked_id)->delete();
        if($request->flag ==2)
            Favorite::where('shop_id', '=', $request->liker_id)->where('post_id', '=', $request->liked_id)->delete();


    }

    public function edit(Request $request)
    {
//        "edit?post_id="+post_id+"&price="+price+"&name="+name+"&phone="+phone+"&slogan="+slogan+"&body="+body
        Post::where('id',$request->post_id)->update
        (
            [
//                'price'=>$request->price,
                'name'=>$request->name,
                'phone'=>$request->phone,
                'slogan'=>$request->slogan,
                'body'=>$request->body
            ]
        );
    }


}
