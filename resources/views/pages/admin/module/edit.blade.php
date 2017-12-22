@extends('layouts.app')

@section('content')
@if ($errors->any()) <?php /* TODO */ ?>
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
                    {!! Form::open(['action' => 'AdminModulesController@store', 'method' => 'POST']) !!}
                @elseif ($action == 'edit')
                    {!! Form::model($module, ['action' => ['AdminModulesController@update', $module->id], 'method' => 'POST']) !!}
                    {!! Form::hidden('_method', 'PUT') !!}
                @else
                    {!! Form::model($module, ['action' => 'AdminModulesController@store', 'method' => 'POST']) !!}
                @endif
                    <div class="row">
                        <div class="input-field col s12">
                            {{ Form::label('title', 'Title') }}
                            {{ Form::text('title', old('title'), array_merge(['class' => 'validate', 'required' => ''], $disabled ? array('disabled' => '') : array())) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            {{ Form::textarea('body', old('body'), array_merge(['class' => 'validate materialize-textarea', 'required' => '', 'id' => 'article-ckeditor'], $disabled ? array('disabled' => '') : array())) }}
                        </div>
                    </div>
                    @if ($action == 'create' || $action == 'edit')
                        <button type="submit" class="waves-effect waves-light btn"> {{ $title }}</button>
                    @endif
                {!! Form::close() !!}
                @if ($action == 'edit')
                    <a href="{{ url('/admin/modules/'.$module->id.'/edit/quiz') }}" class="waves-effect waves-light btn"> {{ "Goto Quiz" }}</a>
                    {!! Form::open(['action' => ['AdminModulesController@destroy', $module->id], 'method' => 'POST']) !!}
                        {!! Form::hidden('_method', 'DELETE') !!}
                        <button type="submit" class="red right waves-effect waves-light btn"> {{ "Delete Module" }}</button>
                    {!! Form::close() !!}    
                @endif
            </div>
        </div>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
    <script>
        $(document).ready(function() {
            Materialize.updateTextFields();
        });
    </script>
@endsection