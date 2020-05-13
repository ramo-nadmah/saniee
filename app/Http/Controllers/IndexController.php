<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function main()
    {
        $categories=Category::all();
        return view('index',compact(['categories']));
    }
    public function getFollowedPosts()
    {

    }
}
