<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //$uploads自己定義的
    protected $uploads = '/images/';
    
    protected $fillable = ['file'];

    public function getFileAttribute($photo)
    {
        return $this->uploads . $photo;
    }
    
}
