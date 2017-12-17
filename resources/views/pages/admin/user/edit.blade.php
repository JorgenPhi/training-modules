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
                    {!! Form::model($user, ['action' => ['AdminUsersController@update', $user->id], 'method' => 'PUT']) !!}
                @else
                    {!! Form::model($user, ['action' => 'AdminUsersController@store', 'method' => 'POST']) !!}
                @endif
                    <div class="row">
                        <div class="input-field col s12">
                            {{ Form::label('name', 'Name') }}
                            {{ Form::text('name', old('name'), array_merge(['class' => 'validate'], $disabled ? array('disabled' => '') : array())) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            {{ Form::label('company', 'Company Name') }}
                            {{ Form::text('company', old('company'), array_merge(['class' => 'validate'], $disabled ? array('disabled' => '') : array())) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            {{ Form::label('email', 'Email') }}
                            {{ Form::email('email', old('email'), array_merge(['class' => 'validate'], $disabled ? array('disabled' => '') : array())) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <input name="admin" id="admin" type="checkbox" <?php echo (isset($user->admin) && $user->admin) ? 'checked' : '' ?> <?php echo ($disabled ? 'disabled' : '') ?>>
                            {{ Form::label('admin', 'Admin') }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <input name="active" id="active" type="checkbox" <?php echo (isset($user->active) && $user->active) ? 'checked' : '' ?> <?php echo $disabled ? 'disabled' : '' ?>>
                            {{ Form::label('active', 'Active') }}
                        </div>
                    </div>
                    @if ($action == 'create' || $action == 'edit')
                        <button type="submit" class="waves-effect waves-light btn"> {{ $title }}</button>
                        @if ($action == 'edit')
                            <button type="submit" class="red right waves-effect waves-light btn"> {{ "Delete User" }}</button>
                        @endif
                    @endif
                {!! Form::close() !!}
            </div>
        </div>
    <script>
        $(document).ready(function() {
            Materialize.updateTextFields();
        });
    </script>
@endsection