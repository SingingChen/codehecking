@extends('layouts.admin')


@section('content')

    <h1>Posts</h1>

     <table class="table">
         <thead>
           <tr>
             <th>ID</th>
             <th>Owner</th>
             <th>Category</th>
             <th>Photo</th>
             <th>Title</th>
             <th>Body</th>
             <th>Create</th>
             <th>Update</th>
           </tr>
         </thead>
         <tbody>
         @if($posts)
             @foreach($posts as $post)
           <tr>
             <td>{{$post->id}}</td>
             <td>{{$post->user->name}}</td>
             <td>{{$post->category_id}}</td>
             <td>{{$post->photo_id}}</td>
             <td>{{$post->title}}</td>
             <td>{{$post->body}}</td>
             <td>{{$post->created_at->diffForHumans()}}</td>
             <td>{{$post->updated_at->diffForHumans()}}</td>
           </tr>

           @endforeach
          @endif
         </tbody>
       </table>


    @endsection