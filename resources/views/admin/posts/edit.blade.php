@extends('layouts.admin')


@section('content')

    <h1>Edit Post</h1>

    {!! Form::model($post,['method'=>'PATCH','action'=>['AdminPostController@update',$post->id] ,'files'=>true]) !!}

    <div class="form-group">

        {{--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++--}}
        {{--{!! Form::text('id','value' or null ,['attribute'=>'class or placeholder...']) !!}--}}
        {{--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++--}}


        {!! Form::label('title','Title') !!}
        {!! Form::text('title',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('category_id','Category') !!}
        {!! Form::select('category_id',[''=>'options'] + $categories ,null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('photo_id','Photo') !!}
        {!! Form::file('photo_id',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('body','Description') !!}
        {!! Form::textarea('body',null,['placeholder'=>'enter content','cols'=>100]) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Updated post',['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}


    @include('includes.form_error')


@endsection