@extends('layouts.app')

@section('content')
    <h5>Modules:</h5>
    @if(count($modules) > 0)
        @foreach($modules as $module)
            <a class="card waves-teal waves-effect" style="width: 100%;" href="{{ url('/modules/'.$module->id.'') }}">
                <div class="card-content">
                    <i class="material-icons right hide-on-small-only">keyboard_arrow_right</i>
                    <span style="font-weight: 400; font-weight: thin; font-size: .7em; color: #bdbdbd;" class="right">{{$module->created_at}}</span>
                    {{$module->title}}
                </div>
            </a>
        @endforeach
        {{ $modules->links() }}
    @else
        <div class="row">
            <p>There are no modules.</p>
        </div>
    @endif
@endsection
