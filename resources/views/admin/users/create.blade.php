@extends('layouts.admin')

@section('content')
    <h1>Create Users</h1>

     {!! Form::open(['method'=>'POST','action'=>'AdminUserController@store']) !!}

         <div class="form-group">

         {{--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++--}}
             {{--{!! Form::text('id','value' or null ,['attribute'=>'class or placeholder...']) !!}--}}
          {{--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++--}}


             {!! Form::label('name','Name') !!}
             {!! Form::text('name',null,['class'=>'form-control']) !!}

         </div>

        <div class="form-group">

        {!! Form::label('email','Email') !!}
        {!! Form::email('email',null,['class'=>'form-control']) !!}

         </div>

        <div class="form-group">

        {!! Form::label('role_id','Role') !!}
        {!! Form::select('role_id',[''=>'Choose Options'] + $roles ,null,['class'=>'form-control']) !!}

         </div>

        <div class="form-group">

        {!! Form::label('status','Status') !!}
        {!! Form::select('status',['0'=>'Not Active','1'=>'Active'],'1',['class'=>'form-control']) !!}

         </div>




    <div class="form-group">
            {!! Form::submit('create User',['class'=>'btn btn-primary']) !!}
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