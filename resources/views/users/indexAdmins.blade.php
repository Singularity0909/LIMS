@extends('layouts.default')
@section('title', 'Manage admins')

@section('content')
<div class="offset-md-2 col-md-8">
  <h2 class="mb-4 text-center title">All administrators</h2>
  <form action="{{ route('createAdmin') }}" method="get">
    <button type="submit" class="btn btn-m btn-info create-user-btn">Create</button>
  </form>
  <div class="list-group list-group-flush">
    @foreach ($users as $user)
      @include('users._user')
    @endforeach
  </div>

  <div class="mt-3">
    {!! $users->render() !!}
  </div>
</div>
@stop
