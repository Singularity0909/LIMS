@extends('layouts.default')

@section('content')
  <div class="jumbotron welcome">
    <h2 class="title">Welcome to Library Information Management System</h2><br><br>
    <a class="btn btn-lg btn-success fa fa-reply" href="{{ route('createLent') }}" role="button"> Borrow </a>
    <a class="btn btn-lg btn-success fa fa-share" href="{{ route('createReturned') }}" role="button"> Return </a>
  </div>
@stop
