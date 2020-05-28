@extends('layouts.default')
@section('title', 'Manage admins')

@section('content')
<div class="offset-md-2 col-md-8">
  <div class="index-title mb-2">
    <form action="{{ route('createAdmin') }}" method="get">
      <button type="submit" class="btn btn-m btn-info create-btn">
        <i class="fa fa-plus"></i>
      </button>
    </form>

    <form action="" method="get">
      <table class="search_tab mb-2">
        <tr>
          <td>
            <select name="role" class="form-control">
              <option value="">All roles</option>
              <option value="1">Books admin</option>
              <option value="2">Readers admin</option>
              <option value="3">Superuser</option>
            </select>
          </td>
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
