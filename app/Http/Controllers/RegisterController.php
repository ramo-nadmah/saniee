<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    //
    public function main()
    {
        if (Auth::check()) return redirect("/");

        return view('register');
    }

    public function registration(Request $request)
    {
        $validateData = $request->validate
        (
            [
                'email' => 'required|unique:users',
                'password' => 'required|min:8',
                'name' => 'required|max:20'


            ]
        );
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        if ($request->hasFile('image')) {
//                ===================================storage S3

            $path = $request->file('image')->store('images', 's3');
            Storage::disk('s3')->setVisibility($path, 'public');
            $name = Storage::disk('s3')->url($path);
//                ===================================

//                $image = $request->file('image');
//                $name = '/images/'.md5(time() . rand(0, 10000)) . '.' . $image->getClientOriginalExtension();
//                $destinationPath = public_path('/images');
//                $image->move($destinationPath, $name);


            $user->logo = $name;
        } else {
            $user->logo = "/static_images/download.jpg";
        }

        $user->save();

        return redirect('/login');

    }

}
