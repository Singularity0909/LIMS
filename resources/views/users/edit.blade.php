@extends('layouts.default')
@section('title', 'Update profile')

@section('content')
<div class="offset-md-2 col-md-8">
  <div class="card ">
    <div class="card-header">
      <h5>Update profile</h5>
    </div>
      <div class="card-body">

        @include('shared._errors')

        <div class="gravatar_edit">
          <a href="https://gravatar.com/emails" target="_blank">
            <img src="{{ $user->gravatar('200') }}" alt="{{ $user->name }}" class="gravatar"/>
          </a>
        </div>

        <form method="POST" action="{{ route('users.update', $user->id )}}">
          {{ method_field('PATCH') }}
          {{ csrf_field() }}

          <div class="form-group">
            <label for="id">ID: </label>
            <input type="text" name="id" class="form-control" value="{{ $user->id }}" disabled>
          </div>

          <div class="form-group">
            <label for="name">Name: </label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}" disabled>
          </div>

          <div class="form-group">
            <label for="email">Email: </label>
            <input type="text" name="email" class="form-control" value="{{ $user->email }}">
          </div>

          <div class="form-group">
            <label for="phone">Phone: </label>
            <input type="text" name="phone" class="form-control" value="{{ $user->phone }}">
          </div>

          <div class="form-group">
            <label for="password">New password: </label>
            <input type="password" name="password" class="form-control" value="{{ old('password') }}">
          </div>

          <div class="form-group">
            <label for="password_confirmation">Password confirmation: </label>
            <input type="password" name="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}">
          </div>

          @if (App\Models\User::getRole(Auth::user()) == 'Superuser' and App\Models\User::getRole($user) != 'Superuser')
            <div class="form-group form-control">
              <label for="authority">Authority: </label>
              <label class="radio-inline">
                <input type="radio" value=1 name="authority">  Manage books
              </label>
              <label class="radio-inline">
                <input type="radio" value=2 name="authority">  Manage readers
              </label>
            </div>
          @endif

          <button type="submit" class="btn btn-primary">
            <i class="fa fa-cog fa-fw fa-lg"></i> Update
          </button>
        </form>
    </div>
  </div>
</div>
@stop
