@extends('layouts.admin')

@section('content')
    <h1>Edit Users</h1>


    <div class="col-sm-3">


        <img src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400'}}" alt="" class="img-responsive img-rounded">


    </div>


    <div class="col-sm-9">

    {{--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++--}}
    {{--記得綁定才會在編輯頁面顯示資料庫裡的資料--}}
    {{--open改成model --}}
    {{--綁定$user--}}
    {{--method是Patch--}}
    {{--指定$user->id--}}
    {{--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++--}}

    {!! Form::model($user,['method'=>'Patch','action'=>['AdminUserController@update',$user->id],'files'=>true]) !!}

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

        {!! Form::label('is_active','Status') !!}
        {!! Form::select('is_active',['0'=>'Not Active','1'=>'Active'],null,['class'=>'form-control']) !!}

    </div>

    <div class="form-group">

        {!! Form::label('photo_id','File') !!}
        {!! Form::file('photo_id',null,['class'=>'form-control']) !!}

    </div>

    <div class="form-group">

        {!! Form::label('password','Password') !!}
        {!! Form::password('password',null,['class'=>'form-control']) !!}

    </div>


    <div class="form-group">
        {!! Form::submit('create User',['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}

    @include('includes.form_error')

    </div>




@stop