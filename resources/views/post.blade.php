@extends('layouts.blog-post')

@section('content')
    <!-- Blog Post -->

    <!-- Title -->
    <h1>{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{$post->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{$post->photo->file}}" alt="">

    <hr>

    <!-- Post Content -->
    <p class="lead">{{$post->body}}</p>


    <hr>


    @if(Session::has('comment_message'))
        {{session('comment_message')}}


        @endif

    <!-- Blog Comments -->
@if(Auth::check())
    <!-- Comments Form -->
    <div class="well">
     {!! Form::open(['method'=>'POST','action'=>'PostCommentsController@store']) !!}

         <div class="form-group">

             <input type="hidden" name="post_id" value="{{$post->id}}">
             <input type="hidden" name="email" value="{{$post->user->email}}">
             <input type="hidden" name="author" value="{{$post->user->name}}">

             {!! Form::label('body','Leave Comment') !!}
             {!! Form::textarea('body',null,['class'=>'form-control','row'=>3]) !!}

         </div>

         <div class="form-group">
            {!! Form::submit('Post Comment',['class'=>'btn btn-primary']) !!}
         </div>

         {!! Form::close() !!}

    </div>
@endif
    <hr>

    <!-- Posted Comments -->

    <!-- Comment -->
    @if(count($comments)>0)
        @foreach($comments as $comment)
    <div class="media">
        <a class="pull-left" href="#">
            <img height="64" class="media-object" src="{{$comment->photo}}" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading">{{$comment->author}}
                <small>{{$comment->created_at->diffForHumans()}}</small>
            </h4> {{$comment->body}}

            <!-- Nested Comment -->

        @if(count($comment->replies)>0)

            @foreach($comment->replies as $reply)

                @if($reply->is_active == 1)
                    <div class="media nested-comment">
                        <a class="pull-left" href="#">
                            <img height="64" class="media-object" src="{{Auth::user()->gravatar}}" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">{{$reply->author}}
                                <small>{{$reply->created_at->diffForHumans()}}</small>
                            </h4>
                            {{$reply->body}}
                        </div>
                    </div>
                @endif
            @endforeach


                @if(Session::has('reply_message'))

                    {{session('reply_message')}}
                    @endif
            <div class="comment-reply-container">

                <button class="toggle_reply btn btn-primary pull-right">Reply</button>

                <div class="comment_reply col-sm-7">
                    {!! Form::open(['method'=>'POST','action'=>'CommentRepliesController@createReply']) !!}

                    <div class="form-group">

                        <input type="hidden" name="comment_id" value="{{$comment->id}}">
                        {!! Form::label('body','Body') !!}
                        {!! Form::textarea('body',null,['class'=>'form-control','rows'=>1]) !!}

                    </div>

                    <div class="form-group">
                        {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}
                    </div>

                    {!! Form::close() !!}
                </div>

            </div>
        @endif
        </div>
        <!-- End Nested Comment -->

    </div>
        @endforeach

    @endif

    @stop

@section('scripts')
    <script
            src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>
    <script>

        $('.comment-reply-container .toggle_reply').click(function(){
            $(this).next().slideToggle();

        })


    </script>

    @stop