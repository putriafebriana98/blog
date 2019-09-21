<?php

namespace App;

use DB;
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
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function scopeFilter($query,$filter){
        if (sizeof($filter)!=0){
            if($month=$filter['month']){
                $query->whereMonth('created_at',$month);
            }
            if($year=$filter['year']){
                $query->whereYear('created_at',$year);
        }

        }
    }
    public static function archives(){
        return \DB::table('posts')
            ->select(DB::raw('year(created_at) as year,month(created_at) as month,count(*) as published'))
            ->groupBy('year','month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();
}
}
//comment on the tinker
/*$posts = App\Post::find(6);
$posts->comments;
*/
