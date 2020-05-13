<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Shop;




class ShopRegisterController extends Controller
{
    //







    public function main()
    {

        return view('shop_Regestration');
    }

    public function registration(Request $request)
    {

//        $this->validate($request, [
//            'password' => 'required|min:6'
//        ]);
        if($request->hasFile('image')) {
        $shop = new Shop();
        $shop->email = $request->email;
        $shop->name = $request->shop_name;
        $shop->category_id=$request->category;
        $shop->description=$request->description;
        $shop->address=$request->address;
        $shop->phone=$request->phone;


        $image = $request->file('image');
        $name = md5(time() . rand(0, 10000)) . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $name);
        $shop->logo = $name;

        $shop->password = Hash::make($request->password);
        $shop->save();

        return redirect('/login_shop');
        }
        else
            return redirect()->back()->with('error', 'Please Select Images');





    }



}
