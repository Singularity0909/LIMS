@extends('layouts.default')
@section('title', 'Borrowed records')

@section('content')
  <h3 class="mb-4">Borrowed records of {{ App\Models\User::where('id', '=', $uid)->first()->name }}</h3>
  <table class="table table-hover bg-light">
    <thead>
      <tr>
        <th>Book ID</th>
        <th>ISBN</th>
        <th>Title</th>
        <th>Borrowed at</th>
        <th>Due at</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($records as $record)
        @include('records._lentByUser')
      @endforeach
    </tbody>
  </table>
@stop
