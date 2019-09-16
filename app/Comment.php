<?php

namespace App;


class Comment extends Model
{
    public  function post(){
        return $this->belongsTo(Post::class);
    }
}
//command on the tinker file
/*$comments=App\Comment::first();
$comments->post;*/
