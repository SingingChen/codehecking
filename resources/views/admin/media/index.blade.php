@extends('layouts.admin')

@section('content')

    <h1>Medias</h1>

    @if($photos)
     <table class="table">
         <thead>
           <tr>
             <th>Id</th>
             <th>Photo</th>
             <th>Create Date</th>
           </tr>
         </thead>
         <tbody>
         @foreach($photos as $photo)
           <tr>
             <td>{{$photo->id}}</td>
             <td><img height="50" src="{{$photo->file ? $photo->file:'No Image'}}" alt=""></td>
             <td>{{$photo->created_at ? $photo->created_at->diffForHumans() : 'No Photo'}}</td>
           </tr>
          @endforeach
         </tbody>
       </table>
     @endif


    @stop