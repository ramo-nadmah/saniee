<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Shop;
use Illuminate\Support\Facades\Storage;


class ShopRegisterController extends Controller
{
    //







    public function main()
    {

        return view('shop_Regestration');
    }

    public function registration(Request $request)
    {
        $validateData=$request->validate
        (
            [
                'email'=>'required|unique:shops',
                'password'=>'required|min:8',
                'phone'=>'digits_between:9,10',
                'name'=>'required|max:35'



            ]
        );
//        $this->validate($request, [
//            'password' => 'required|min:6'
//        ]);
//        dd($request);
        if($request->hasFile('image')) {
        $shop = new Shop();

        $shop->email = $request->email;
        $shop->name = $request->name;
        $shop->category_id=$request->category;
        $shop->description=$request->description;
        $shop->address=$request->address;
        $shop->phone=$request->phone;
//================================== s3 storage

            $path=$request->file('image')->store('images','s3');


            Storage::disk('s3')->setVisibility($path,'public');
            $name=Storage::disk('s3')->url($path);

//        =================================

//
//        $image = $request->file('image');
//        $name = '/images/'.md5(time() . rand(0, 10000)) . '.' . $image->getClientOriginalExtension();
//        $destinationPath = public_path('/images');
//        $image->move($destinationPath, $name);
        $shop->logo = $name;

        $shop->password = Hash::make($request->password);
        $shop->save();

        return redirect('/login_shop');
        }
        else
            return redirect()->back()->with('error', 'Please Select Images');





    }



}
