<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    //

    public function showForm()
    {
        return view('test');
    }

    public function store(Request $request)
    {

        $path=$request->file('image')->store('images','s3');


        Storage::disk('s3')->setVisibility($path,'public');
        $name=Storage::disk('s3')->url($path);

        return $name;

    }

}
