<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    //
    public function main()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        $validateData=$request->validate
        (
            [
                'email'=>'required|exists:users',
                'password'=>'required|min:8',



            ]
        );
//       $this->validate($request, [
//
//       ]);


        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...


         return redirect("/");
       }else{
           return redirect("/login");
       }

    }


    public function userlogout()
    {
        Auth::guard('web')->logout();



        return redirect('/');
    }
}
