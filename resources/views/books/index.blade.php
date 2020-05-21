@extends('layouts.default')
@if (in_array(App\Models\User::getRole(Auth::user()), ['Superuser', 'Books admin']))
  @section('title', 'Manage books')
@else
  @section('title', 'Index books')
@endif

@section('content')
<div class="offset-md-2 col-md-8">
  <div class="index-title">
    <form action="{{ route('createBook') }}" method="get">
      <button type="submit" class="btn btn-m btn-info create-btn">
        <i class="fa fa-plus"></i> Create</a>
      </button>
    </form>
    <h2 class="mb-4"> All books</h2>
  </div>
  <div class="list-group list-group-flush index-list">
    @foreach ($books as $book)
      @include('books._book')
    @endforeach
  </div>

  <div class="mt-3">
    {!! $books->render() !!}
  </div>
</div>
@stop
