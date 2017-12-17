@extends('layouts.app')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <h5>{{ $title }}:</h5>
        <div class="row">
            <div class="col s12">
                @if ($action == 'create')
                    {!! Form::open(['action' => 'AdminUsersController@store', 'method' => 'POST']) !!}
                @elseif ($action == 'edit')
                    {!! Form::model($user, ['action' => 'AdminUsersController@store', 'method' => 'POST']) !!}
                @else
                    {!! Form::model($user, ['action' => 'AdminUsersController@store', 'method' => 'POST']) !!}
                @endif
                    <div class="row">
                        <div class="input-field col s12">
                            {{ Form::label('name', 'Name') }}
                            {{ Form::text('name', old('name'), array_merge(['class' => 'validate'], $options)) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            {{ Form::label('company', 'Company Name') }}
                            {{ Form::text('company', old('company'), array_merge(['class' => 'validate'], $options)) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            {{ Form::label('email', 'Email') }}
                            {{ Form::email('email', old('email'), array_merge(['class' => 'validate'], $options)) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            {{ Form::label('email', 'Email') }}
                            {{ Form::email('email', old('email'), array_merge(['class' => 'validate'], $options)) }}
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    <script>
        $(document).ready(function() {
            Materialize.updateTextFields();
        });
    </script>
@endsection