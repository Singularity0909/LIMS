@extends('layouts.default')
@if (in_array(App\Models\User::getRole(Auth::user()), ['Superuser', 'Books admin']))
  @section('title', 'Manage books')
@else
  @section('title', 'Index books')
@endif

@section('content')
<div>
  <div class="index-title mb-2">
    @if (in_array(App\Models\User::getRole(Auth::user()), ['Superuser', 'Books admin']))
      <form action="{{ route('createBook') }}" method="get">
        <button type="submit" class="btn btn-m btn-info create-btn">
          <i class="fa fa-plus"></i>
        </button>
      </form>
    @endif
    <form action="" method="get">
      <table class="search_tab mb-2">
        <tr>
          <td>
            <select name="category" class="form-control">
              <option value="">All categories</option>
              @foreach(App\Models\Category::all() as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
            </select>
          </td>
          <td><input type="text" name="keywords" class="form-control" placeholder="Title"></td>
          <td><button type="submit" class="fa fa-search form-control"></td>
        </tr>
      </table>
    </form>
  </div>

  <table class="table table-hover bg-light">
    <thead>
      <tr>
        <th>ISBN</th>
        <th>Title</th>
        <th>Author</th>
        <th>Category</th>
        <th>Available</th>
        <th>Total</th>
        @if (in_array(App\Models\User::getRole(Auth::user()), ['Superuser', 'Books admin']))
          <th></th>
          <th></th>
        @endif
      </tr>
    </thead>
    <tbody>
      @foreach ($books as $book)
        @include('books._book')
      @endforeach
    </tbody>
  </table>

  <div class="mt-3">
    {!! $books->render() !!}
  </div>
</div>
@stop
