<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=[
      'title',
        'body',
        'user_id',
        'category_id',
        'photo_id'
    ];


    public function user()
    {
        $this->belongsTo('App\User');
    }

    public function photo()
    {
        $this->belongsTo('App\Photo');
    }

    public function category()
    {
        $this->belongsTo('App\Category');
    }

}
