<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class postController extends Controller
{
    public function index(){
        return view('posts',["title" => "Posts", "posts" => Post::all()]);
    }

    // public function show($id){
    //     return view('post',
    // [
    //     "title" => "single post",
    //     "post" => Post::find($id)
    // ]);
    // }

    public function show(Post $post){
        return view('post',
    [
        "title" => "single post",
        "post" => $post
    ]);
    }
}
