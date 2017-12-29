@extends('layouts.app')

@section('content')
    <h5>Modules:</h5>
    @if(count($modules) > 0)
        @foreach($modules as $module)
        <a class="card waves-teal waves-effect" style="width: 100%;" href="{{ url('/admin/modules/'.$module->id.'/edit') }}">
            <div class="card-content">
                <i class="material-icons right hide-on-small-only">keyboard_arrow_right</i>
                <span style="font-weight: 400; font-weight: thin; font-size: .7em; color: #bdbdbd;" class="right">{{$module->created_at}}</span>
                {{$module->title}}
            </div>
        </a><?php /*
        <div class='well'>
            <a class="waves-effect waves-light btn-large btn ng-binding ng-scope" style="margin-bottom: 10px; width: 100%;">{{$module->title}}</a>
        </div> */?>
        @endforeach
        {{ $modules->links() }}
    @else
        <div class="row">
            <p>There are no modules. Would you like to <a href="">create one</a>?</p>
        </div>
    @endif
    <a href="{{ url('/admin/modules/create') }}" class="waves-effect waves-light btn">Create Module</a>
@endsection
