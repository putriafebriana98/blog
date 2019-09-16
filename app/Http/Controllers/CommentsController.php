<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;

class CommentsController extends Controller
{
    public function store(Post $post){
/*     // manual usage of creating new comment
         Comment::create([
            'body'=>request('body'),
            'post_id'=>$post->id
        ]);*/
        $this->validate(request(),['body'=>"required|min:2"]);
        $post->addComment(request('body'));
        return back();
    }
}
