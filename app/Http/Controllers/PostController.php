<?php

namespace App\Http\Controllers;
use DB;
use App\Post;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index','show');
    }

    //
    function index(){
        $posts=Post::orderBy('created_at','desc')->get();
        $archives = \DB::table('posts')->select(DB::raw('year(created_at) as year,month(created_at) as month,count(*) as published'))->groupBy('year','month')->get()->toArray();
        return view("posts.index",compact('posts','archives'));
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
