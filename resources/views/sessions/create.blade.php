@extends('layouts.default')
@section('title', 'Login')

@section('content')
<div class="offset-md-2 col-md-8">
  <div class="card ">
    <div class="card-header">
      <h5>Login</h5>
    </div>
    <div class="card-body">
      @include('shared._errors')

      <form method="POST" action="{{ route('login') }}">
          {{ csrf_field() }}

          <div class="form-group">
            <label for="id">ID: </label>
            <input type="text" name="id" class="form-control" value="{{ old('id') }}">
          </div>

          <div class="form-group">
            <label for="password">Password (<a href="{{ route('password.request') }}">Forget password</a>): </label>
            <input type="password" name="password" class="form-control" value="{{ old('password') }}">
          </div>

          <div class="form-group">
            <div class="form-check">
              <input type="checkbox" class="form-check-input" name="remember" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Remember me</label>
            </div>
          </div>

          <button type="submit" class="btn btn-primary">
            <i class="fa fa-sign-in fa-fw fa-lg"></i> Login
          </button>
      </form>

      <hr>
    </div>
  </div>
</div>
@stop
