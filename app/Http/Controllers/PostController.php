<?php

namespace App\Http\Controllers;
use DB;
use App\Repositories\Posts;
use App\Post;


class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index','show');
    }

    //
    function index(Posts $postss){
        $posts=$postss->all();
      //  $posts=(new \App\Repositories\Posts)->all();
       // $posts=Post::latest()->filter(request(['month','year']))->get();
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
/*         Post::create([
            'title'=>request('title'),
            'body'=>request('body'),
            'user_id'=>auth()->user()->id
            ]);*/
        auth()->user()->publish(
            new Post(request(['title','body']))
        );
        return redirect('/');
    }
    public function show(Post $post){

        return view("posts.show",compact('post'));
    }
}
