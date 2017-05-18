@extends('layouts.admin')


@section('content')

    <h1>Create Post</h1>


     {!! Form::open(['method'=>'POST','action'=>'AdminPostController@store' ,'files'=>true]) !!}

         <div class="form-group">

         {{--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++--}}
             {{--{!! Form::text('id','value' or null ,['attribute'=>'class or placeholder...']) !!}--}}
          {{--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++--}}


             {!! Form::label('title','Title') !!}
             {!! Form::text('title',null,['class'=>'form-control']) !!}
         </div>

         <div class="form-group">
             {!! Form::label('category_id','Category') !!}
             {!! Form::select('category_id',array([0=>'PHP',1=>'Laravel']),null,['class'=>'form-control']) !!}
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
            {!! Form::submit('create post',['class'=>'btn btn-primary']) !!}
         </div>

         {!! Form::close() !!}


        @include('includes.form_error')



@endsection