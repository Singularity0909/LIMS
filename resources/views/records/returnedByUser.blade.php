@extends('layouts.default')
@section('title', 'Borrowed records')

@section('content')
  <h3 class="mb-4 font-weight-bold">
    Returned records of
    <a href="{{ route('users.show', $uid) }}">
      {{ App\Models\User::where('id', '=', $uid)->first()->name }}
    </a>
  </h3>
  <table class="table table-hover bg-light">
    <thead>
      <tr>
        <th>Book ID</th>
        <th>ISBN</th>
        <th>Title</th>
        <th>Borrowed at</th>
        <th>Returned at</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($records as $record)
        @include('records._returnedByUser')
      @endforeach
    </tbody>
  </table>
@stop
