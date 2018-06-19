@extends('layouts.app')

@section('content')
<div class="jumbotron w-75 p-3 mt-5 mx-auto">
        <h1 class="display-4" >Users List</h1>
        <div class="container">
            <ul class="list-group">
                @foreach($response['response'] as $user)
                    <li class="list-group-item">
                        <a class="nav-link float-left" href="/api/users/{{$user->id}}">
                            {{$user->first_name." ".$user->last_name}}
                        </a>
                        {!! Form::open([
                            'url' => 'api/users/'.$user->id, 
                            'method' => 'DELETE', 
                            'class' => 'float-right'
                            ]) !!}
                            <button class="btn btn-danger">X</button>
                        {!! Form::close() !!}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>        
@endsection