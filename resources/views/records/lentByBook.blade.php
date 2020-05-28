@extends('layouts.default')
@section('title', 'Borrowed records')

@section('content')
  <h3 class="mb-4">Borrowed records of {{ App\Models\BookInfo::where('isbn', '=', $isbn)->first()->title }}</h3>
  <table class="table table-hover bg-light">
    <thead>
      <tr>
        <th>Book ID</th>
        <th>User ID</th>
        <th>User Name</th>
        <th>Borrowed at</th>
        <th>Due at</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($records as $record)
        @include('records._lentByBook')
      @endforeach
    </tbody>
  </table>
@stop
