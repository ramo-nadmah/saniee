<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(Request $request){
        $posts = DB::table('posts')->where("name","like",'%'.$request->keyword.'%')->get(['name']);
        return response($posts);
    }
}
