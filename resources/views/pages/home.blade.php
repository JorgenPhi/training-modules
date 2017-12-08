@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">

            <div class="panel-body">
                @if ( Auth::check() )
                    You are logged in!
                    Current user: {{ Auth::user()->name }}
                    @if ( Auth::user()->admin === 1 )
                        You are an administrator!
                    @else
                        You are a regular user
                    @endif
                @else
                    You are not logged in!
                @endif
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                
            </div>
        </div>
    </div>
</div>
@endsection
