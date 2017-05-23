<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

class AdminMediascontroller extends Controller
{
    //

    public function index()
    {
        $photos = Photo::all();

        return view('admin.media.index',compact('photos'));

    }

    public function create()
    {
        return view('admin.media.create');
    }


    public function store(Request $request)
    {
        $file = $request->file('file');

        $name = time().$file->getClientOriginalName();

        $file->move('image',$name);

        Photo::create(['file'=>$name]);

    }





}
