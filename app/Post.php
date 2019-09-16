<?php

namespace App;


class Post extends Model
{
    //remember 1 post to many comments, so the name of the method using s
    public function comments(){
        //sama aja  return $this->hasMany('App\Comment');
        return $this->hasMany(Comment::class);
    }
    public function addComment($body){
 /*       Comment::create([
            'body'=>$body,
            'post_id'=>$this->id
        ]);*/
        $this->comments()->create(compact('body'));
    }
}
//comment on the tinker
/*$posts = App\Post::find(6);
$posts->comments;
*/
