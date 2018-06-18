@extends('layouts.app')

@section('content')
    <h1>Hello from the index</h1>
    @foreach($users as $user)
        <div>
        <div>{{$user->first_name." ".$user->last_name}}</div>
        </div>
    @endforeach
@endsection