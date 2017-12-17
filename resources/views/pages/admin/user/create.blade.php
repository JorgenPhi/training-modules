@extends('layouts.app')

@section('content')
    <h5>New User:</h5>
    @if ()
    {!! Form::open(['action' => 'AdminUsersController@store', 'method' => 'POST']) !!}
        <div class="row">
            <form class="col s12">
                <div class="row">
                    <div class="input-field col s12">
                        <input disabled value="I am not editable" id="disabled" type="text" class="validate">
                        {{ Form::label('email', 'Email') }}
                        {{ Form::email('email', )}}
                    </div>
                </div>

    {!! Form::close() !!}
    <script>
        $(document).ready(function() {
            Materialize.updateTextFields();
        });
    </script>
@endsection