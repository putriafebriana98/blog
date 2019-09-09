<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    //
    function index(){
        $posts=Post::orderBy('created_at','desc')->get();
        return view("posts.index",compact('posts'));
    }
    function create(){
        return view("posts.create");
    }
    public function store(){
        //dd(request(['title','body']));
     /*   $post=new \App\Post;
        $post->title=request('title');
        $post->body=request('body');
        $post->save();
     Post::create([
         'title' => request('title'),
         'body' => request('body')]

     );*/
     $this->validate(request(),[
         'title'=>'required',
         'body'=>'required'
     ]);
        Post::create(request(['title','body'])
        );

        return redirect('/');
    }
    public function show(Post $post){
        return view("posts.show",compact('post'));
    }
}
