@extends('layouts.admin')


@section('content')

    @if(count($replies)>0)
        <h1 class="text-center">Replies</h1>

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


            @foreach($replies as $reply)
                <tr>
                    <td>{{$reply->id}}</td>
                    <td>{{$reply->author}}</td>
                    <td>{{$reply->email}}</td>
                    <td>{{$reply->body}}</td>
                    <td><a href="{{route('home.post',$reply->comment->post->id)}}">View Post</a></td>
                    <td>
                        @if($reply->is_active == 0)
                            {!! Form::model($reply,['method'=>'PATCH','action'=>['CommentRepliesController@update',$reply->id]]) !!}

                            <input type="hidden" name="is_active" value="1">
                            <div class="form-group">
                                {!! Form::submit('unApprove',['class'=>'btn btn-success']) !!}
                            </div>

                            {!! Form::close() !!}

                        @else
                            {!! Form::model($reply,['method'=>'PATCH','action'=>['CommentRepliesController@update',$reply->id]]) !!}

                            <input type="hidden" name="is_active" value="0">
                            <div class="form-group">
                                {!! Form::submit('Approve',['class'=>'btn btn-info']) !!}
                            </div>

                            {!! Form::close() !!}

                        @endif
                    </td>
                    <td>
                        {!! Form::model($reply,['method'=>'DELETE','action'=>['CommentRepliesController@destroy',$reply->id]]) !!}

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

        <h1 class="text-center">No Reply</h1>

    @endif



@stop
