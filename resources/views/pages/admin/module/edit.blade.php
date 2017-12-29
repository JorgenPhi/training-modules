@extends('layouts.app')

@section('content')
@if ($errors->any())
    <div class="row" id="alert_box">
      <div class="col s12 m12">
        <div class="card red darken-1">
          <div class="row">
            <div class="col s12 m10">
              <div class="card-content white-text">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
          </div>
          <div class="col s12 m2">
            <i class="fa fa-times icon_style" id="alert_close" aria-hidden="true"></i>
          </div>
        </div>
       </div>
      </div>
    </div>
    <script type="text/javascript">
        $('#alert_close').click(function(){
            $( "#alert_box" ).fadeOut( "slow", function() {});
        });
    </script>
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
                    <a href="{{ url('/admin/modules/'.$module->id.'/quiz') }}" class="waves-effect waves-light btn">Goto Quiz</a>
                    {!! Form::open(['action' => ['AdminModulesController@destroy', $module->id], 'method' => 'POST']) !!}
                        {!! Form::hidden('_method', 'DELETE') !!}
                        <button type="submit" class="red right waves-effect waves-light btn">Delete Module</button>
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