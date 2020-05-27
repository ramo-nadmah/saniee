<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopLoginController extends Controller
{
    //


    public function main()
    {
        return view('shop_Login');
    }

    public function login(Request $request)
    {

        $validateData=$request->validate
        (
            [
                'email'=>'required|exists:shops',
                'password'=>'required|min:8',



            ]
        );
//       $this->validate($request, [
//          'email'=>requied|email',
//
//       ]);


        $credentials = $request->only('email', 'password');

        if (Auth::guard('shop')->attempt($credentials)) {
            // Authentication passed...


            return redirect("/");
        } else {
            return redirect("/login_shop");
        }

    }


    public function shoplogout()
    {
        Auth::guard('shop')->logout();

        return redirect('/');
    }
}
