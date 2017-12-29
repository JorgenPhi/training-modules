@extends('layouts.app')

@section('content')

  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <h1 class="header center gold-text">{{ config('app.name', 'Module Based Training') }}</h1>
      <div class="row center">
        <h5 class="header col s12 light">A training system written in Laravel.</h5>
      </div>
      <br><br>

    </div>
  </div>

  <div class="section">
    @if ( Auth::check() )
        Welcome {{ Auth::user()->name }} !
        @if ( Auth::user()->active !== 1 )
            <p>Your account is not activated yet.</p>
        @endif
    @else
        <p>You are not logged in, <a href="{{ url('/register') }}">create an account here</a> or <a href="{{ url('/login') }}">login</a>.</p>
    @endif
  </div>

@endsection
