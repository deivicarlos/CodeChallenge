@extends('layouts.app')

@section('content')
    <h1>Create User</h1>
    

{{-- 
    $table->string('first_name');
            $table->string('last_name');
            $table->string('name');
            $table->string('email');
            $table->date('date_of_birth');
            $table->boolean('is_host');
            $table->decimal('latitude',9,6);
            $table->decimal('longitude',9,6); --}}

    {!! Form::model() !!}

        {!! Form:text('first_name') !!}
        {!! Form:text('last_name') !!}
        {!! Form:text('name', '') !!}
        {!! Form:text('first_name') !!}

    {!! Form::close() !!}
@endsection