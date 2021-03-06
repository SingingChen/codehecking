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
        {!! Form::submit('Update User',['class'=>'btn btn-primary col-sm-6']) !!}
    </div>

    {!! Form::close() !!}


     {!! Form::open(['method'=>'DELETE','action'=>['AdminUserController@destroy',$user->id]]) !!}

         <div class="form-group">
            {!! Form::submit('Delete User',['class'=>'btn btn-danger col-sm-6']) !!}
         </div>

     {!! Form::close() !!}


             @if(count($errors) > 0)
                 <ul>
                 @foreach($errors->all() as $error)

                 <li>{{$error}}</li>

                     @endforeach
                 </ul>
             @endif



    @include('includes.form_error')

    </div>




@stop