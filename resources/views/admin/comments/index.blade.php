@extends('layouts.admin')


@section('content')

    @if(count($comments) > 0)
    <h1 class="text-center">Comments</h1>

         <table class="table">
             <thead>
               <tr>
                 <th>Id</th>
                 <th>Author</th>
                 <th>Email</th>
                 <th>Body</th>
                 <th>View</th>
                 <th>Update</th>
                 <th>Delete</th>

               </tr>
             </thead>
             <tbody>
             @foreach($comments as $comment)
               <tr>
                 <td>{{$comment->id}}</td>
                 <td>{{$comment->author}}</td>
                 <td>{{$comment->email}}</td>
                 <td>{{$comment->body}}</td>
                 <td><a href="{{route('home.post',$comment->post->id)}}">View Post</a></td>
                 <td>
                     @if($comment->is_active == 0)
                        {!! Form::model($comment,['method'=>'PATCH','action'=>['PostCommentsController@update',$comment->id]]) !!}

                            <input type="hidden" name="is_active" value="1">
                            <div class="form-group">
                                {!! Form::submit('unApprove',['class'=>'btn btn-success']) !!}
                            </div>

                        {!! Form::close() !!}

                   @else
                         {!! Form::model($comment,['method'=>'PATCH','action'=>['PostCommentsController@update',$comment->id]]) !!}

                         <input type="hidden" name="is_active" value="0">
                         <div class="form-group">
                             {!! Form::submit('Approve',['class'=>'btn btn-info']) !!}
                         </div>

                         {!! Form::close() !!}

                   @endif
                 </td>
                   <td>
                       {!! Form::model($comment,['method'=>'DELETE','action'=>['PostCommentsController@destroy',$comment->id]]) !!}

                       <div class="form-group">
                           {!! Form::submit('DELETE',['class'=>'btn btn-danger']) !!}
                       </div>

                       {!! Form::close() !!}


                   </td>
               </tr>
             @endforeach
             </tbody>
           </table>





    @else

        <h1 class="text-center">No Comment</h1>

    @endif



@stop
