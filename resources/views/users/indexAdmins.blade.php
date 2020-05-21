@extends('layouts.default')
@section('title', 'Manage admins')

@section('content')
<div class="offset-md-2 col-md-8">
  <div class="index-title">
    <form action="{{ route('createAdmin') }}" method="get">
      <button type="submit" class="btn btn-m btn-info create-btn">
        <i class="fa fa-plus"></i> Create</a>
      </button>
    </form>
    <h2 class="mb-4"> All administrators</h2>
  </div>
  <div class="list-group list-group-flush index-list">
    @foreach ($users as $user)
      @include('users._user')
    @endforeach
  </div>

  <div class="mt-3">
    {!! $users->render() !!}
  </div>
</div>
@stop
