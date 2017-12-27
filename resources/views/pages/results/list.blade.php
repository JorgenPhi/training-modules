@extends('layouts.app')

@section('content')
    <h5>Results:</h5>
    <p>Tap to retake.</p>
    @if(count($results) > 0)
        @foreach($results as $result)
            <?php $module = $result->module; ?>
            <a class="card waves-teal waves-effect <?php echo $result->pass ? "passing-score" : "failing-score"; ?>" style="width: 100%;" href="{{ url('/modules/'.$module->id.'') }}">
                <div class="card-content">
                    <i class="material-icons"><?php echo $result->pass ? "done" : "clear"; ?></i>
                    <i class="material-icons right hide-on-small-only">keyboard_arrow_right</i>
                    <span style="color: #5f5f5f;" class="right hide-on-small-only">{{$result->correctquestions}} correct / {{count($module->questions)}} questions</span>
                    <span>{{$module->title}}</span>
                </div>
            </a>
        @endforeach
    @else
        <div class="row">
            <p>You have not taken any quizzes.</p>
        </div>
    @endif
@endsection
