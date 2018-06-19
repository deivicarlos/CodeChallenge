@extends('layouts.app')

@section('content')
<div class="jumbotron w-75 p-3 mt-5 mx-auto">
        <h1 class="display-4" >Edit User</h1>
                {!! Form::model($response['response'], ['url' => 'api/users/'.$response['response']->id, 'method' => 'PATCH']) !!}
                <div class="form-group">
                    {!! Form::label('first_name', 'First Name') !!}  
                    {!! Form::text('first_name',  $response['response']->first_name, ['class' => 'form-control']) !!}  
                </div>
                <div class="form-group">
                    {!! Form::label('last_name', 'Last Name') !!}  
                    {!! Form::text('last_name',  $response['response']->last_name, ['class' => 'form-control']) !!}  
                </div>
                <div class="form-group">
                    {!! Form::label('name', 'Nickname') !!}  
                    {!! Form::text('name',  $response['response']->name, ['class' => 'form-control']) !!}  
                </div>
                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}  
                    {!! Form::text('email',  $response['response']->email, ['class' => 'form-control']) !!}  
                </div>
                <div class="form-group">
                    {!! Form::label('date_of_birth', 'Date of Birth') !!}  
                    {!! Form::date('date_of_birth',  $response['response']->date_of_birth, ['class' => 'form-control']) !!}  
                </div>
                <div class="form-group">
                    {!! Form::label('is_host', 'Are you Host?') !!}  
                    {!! Form::checkbox('is_host', 1, $response['response']->is_host, ['class' => 'form-control w-auto']) !!}  
                </div>
                
                <button class="btn btn-primary" type="submit">Update User</button>
            {!! Form::close() !!}
    </div>
@endsection