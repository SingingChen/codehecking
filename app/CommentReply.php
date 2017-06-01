<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    protected $fillable = [
        'comment_id',
        'author',
        'is_active',
        'photo',
        'email',
        'body',
    ];


    public function comment()
    {
        return $this->belongsTo('App\Comment');
    }

//    public function photo()
//    {
//        return $this->hasOne('App\Photo');
//    }

}
