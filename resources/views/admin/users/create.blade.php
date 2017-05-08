@extends('layouts.admin')

@section('content')
    <h1>Create Users</h1>

     {!! Form::open(['method'=>'POST','action'=>'AdminUserController@store']) !!}

         <div class="form-group">

         {{--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++--}}
             {{--{!! Form::text('id','value' or null ,['attribute'=>'class or placeholder...']) !!}--}}
          {{--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++--}}


             {!! Form::label('title','Title') !!}
             {!! Form::text('title',null,['class'=>'form-control']) !!}
             {!! Form::label('content','content') !!}
             {!! Form::text('content',null,['placeholder'=>'enter content']) !!}
         </div>

         <div class="form-group">
            {!! Form::submit('create post',['class'=>'btn btn-primary']) !!}
         </div>

         {!! Form::close() !!}


         @if(count($errors) > 0)
             <ul>
             @foreach($errors->all() as $error)

             <li>{{$error}}</li>

                 @endforeach
             </ul>
         @endif



    @stop