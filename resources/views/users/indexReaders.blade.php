@extends('layouts.default')
@section('title', 'Manage readers')

@section('content')
<div class="offset-md-2 col-md-8">
  <div class="index-title mb-2">
    <form action="{{ route('createReader') }}" method="get">
      <button type="submit" class="btn btn-m btn-info create-btn">
        <i class="fa fa-plus"></i>
      </button>
    </form>

    <form action="" method="get">
      <table class="search_tab mb-2">
        <tr>
          <td><input type="text" name="id" class="form-control" placeholder="ID"></td>
          <td><input type="text" name="name" class="form-control" placeholder="Name"></td>
          <td><button type="submit" class="fa fa-search form-control"></td>
        </tr>
      </table>
    </form>
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
