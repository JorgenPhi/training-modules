@extends('layouts.app')

@section('content')
    <h5>{{ $module->title }}:</h5>
    <div class="row">
        <div class="col s12">
                <div class="row">
                    <?php echo $module->body; ?>
                </div>
        </div>
    </div><?php /* TODO -- If no quiz, change text to "Mark as Complete, and add a complete marker to the DB */ ?>
    <a href="{{ url('/modules/'.$module->id.'/quiz') }}" class="waves-effect waves-light btn">Goto Quiz</a>
@endsection