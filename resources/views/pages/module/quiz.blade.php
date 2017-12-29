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
    <h5>{{ $module->title }} - Quiz:</h5>
    {!! Form::open(['action' => ['UserController@quizpost', $module->id], 'method' => 'POST']) !!}
        @if(count($questions) > 0)
            <div class="row">
                <div class="col s12">
                    @foreach($questions as $question)
                        <div class="row">
                            <div class="col s12">
                                <b>Question:</b> {{ $question->text }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s1">
                                  <input name="q{{ $question->id }}" type="radio" id="ans{{ $question->id }}-1" value="1"/>
                                  <label for="ans{{ $question->id }}-1">A</label>
                            </div>
                            <div class="clearfix hide-on-med-and-up"></div>
                            <div class="col s11">
                                <b>A:</b> {{ $question->a1text }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s1">
                                  <input name="q{{ $question->id }}" type="radio" id="ans{{ $question->id }}-2" value="2"/>
                                  <label for="ans{{ $question->id }}-2">B</label>
                            </div>
                            <div class="clearfix hide-on-med-and-up"></div>
                            <div class="col s11">
                                <b>B:</b> {{ $question->a2text }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s1">
                                  <input name="q{{ $question->id }}" type="radio" id="ans{{ $question->id }}-3" value="3"/>
                                  <label for="ans{{ $question->id }}-3">C</label>
                            </div>
                            <div class="clearfix hide-on-med-and-up"></div>
                            <div class="col s11">
                                <b>C:</b> {{ $question->a3text }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s1">
                                  <input name="q{{ $question->id }}" type="radio" id="ans{{ $question->id }}-4" value="4"/>
                                  <label for="ans{{ $question->id }}-4">D</label>
                            </div>
                            <div class="clearfix hide-on-med-and-up"></div>
                            <div class="col s11">
                                <b>D:</b> {{ $question->a4text }}
                            </div>
                        </div>
                        <hr>
                    @endforeach
                    <button type="submit" class="waves-effect waves-light btn"> {{ $title }}</button>
                </div>
            </div>
        @else
            <div class="row">
                <p>There is no quiz for this section. Click submit to mark this module as complete.</p>
            </div>
            <button type="submit" class="waves-effect waves-light btn">{{ $title }}</button>
        @endif
    {!! Form::close() !!}
@endsection