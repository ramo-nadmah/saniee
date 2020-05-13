<?php

namespace App\Http\Controllers;

use App\Member;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Auth;
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
        $this->validate($request, [
            'password' => 'required|min:6'
//            confirmed|
        ]);
        if($request->hasFile('image')) {
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password= Hash::make($request->password);
        $image = $request->file('image');
        $name = md5(time() . rand(0, 10000)) . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $name);
        $user->logo = $name;
        $user->save();

        return redirect('/login'); }
        else
            return redirect()->back()->with('error', 'Please Select Images');
    }

}
