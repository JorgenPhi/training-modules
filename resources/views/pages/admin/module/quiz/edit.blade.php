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
                    {!! Form::open(['action' => ['AdminQuizzesController@store', $module->id], 'method' => 'POST']) !!}
                @elseif ($action == 'edit')
                    {!! Form::model($question, ['action' => ['AdminQuizzesController@update', $module->id, $question->id], 'method' => 'POST']) !!}
                    {!! Form::hidden('_method', 'PUT') !!}
                @else
                    {!! Form::model($question, ['action' => ['AdminQuizzesController@store', $module->id], 'method' => 'POST']) !!}
                @endif
                    <div class="row">
                        <div class="col s12">
                            {{ Form::label('text', 'Text') }}
                            {{ Form::text('text', old('text'), array_merge(['class' => 'validate', 'required' => ''], $disabled ? array('disabled' => '') : array())) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s1">
                              <input name="correct" type="radio" id="ans1" value="1" <?php echo (isset($question->correct) && $question->correct == 1) ? 'checked' : '' ?> <?php echo ($disabled ? 'disabled' : '') ?>/>
                              <label for="ans1">A</label>
                        </div>
                        <div class="col s11">
                            {{ Form::label('a1text', 'Choice A') }}
                            {{ Form::text('a1text', old('a1text'), array_merge(['class' => 'validate', 'required' => ''], $disabled ? array('disabled' => '') : array())) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s1">
                              <input name="correct" type="radio" id="ans2" value="2" <?php echo (isset($question->correct) && $question->correct == 2) ? 'checked' : '' ?> <?php echo ($disabled ? 'disabled' : '') ?>/>
                              <label for="ans2">B</label>
                        </div>
                        <div class="col s11">
                            {{ Form::label('a2text', 'Choice B') }}
                            {{ Form::text('a2text', old('a2text'), array_merge(['class' => 'validate', 'required' => ''], $disabled ? array('disabled' => '') : array())) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s1">
                              <input name="correct" type="radio" id="ans3" value="3" <?php echo (isset($question->correct) && $question->correct == 3) ? 'checked' : '' ?> <?php echo ($disabled ? 'disabled' : '') ?>/>
                              <label for="ans3">C</label>
                        </div>
                        <div class="col s11">
                            {{ Form::label('a3text', 'Choice C') }}
                            {{ Form::text('a3text', old('a3text'), array_merge(['class' => 'validate', 'required' => ''], $disabled ? array('disabled' => '') : array())) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s1">
                              <input name="correct" type="radio" id="ans4" value="4" <?php echo (isset($question->correct) && $question->correct == 4) ? 'checked' : '' ?> <?php echo ($disabled ? 'disabled' : '') ?>/>
                              <label for="ans4">D</label>
                        </div>
                        <div class="col s11">
                            {{ Form::label('a4text', 'Choice D') }}
                            {{ Form::text('a4text', old('a4text'), array_merge(['class' => 'validate', 'required' => ''], $disabled ? array('disabled' => '') : array())) }}
                        </div>
                    </div>
                    @if ($action == 'create' || $action == 'edit')
                        <button type="submit" class="waves-effect waves-light btn"> {{ $title }}</button>
                    @endif
                {!! Form::close() !!}
                @if ($action == 'edit')
                    {!! Form::open(['action' => ['AdminQuizzesController@update', $module->id, $question->id], 'method' => 'POST']) !!}
                        {!! Form::hidden('_method', 'DELETE') !!}
                        <button type="submit" class="red right waves-effect waves-light btn">Delete Question</button>
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