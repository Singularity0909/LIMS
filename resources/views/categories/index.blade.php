@extends('layouts.default')
@section('title', 'Manage categories')

@section('content')
<div>
  <div class="index-title">
    <form action="{{ route('createCategory') }}" method="get">
      <button type="submit" class="btn btn-m btn-info create-btn">
        <i class="fa fa-plus"></i> Create</a>
      </button>
    </form>
    <h2 class="mb-4"> All categories</h2>
  </div>

  <table class="table table-hover bg-light">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Amount</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($categories as $category)
        @include('categories._category')
      @endforeach
    </tbody>
  </table>

  <div class="mt-3">
    {!! $categories->render() !!}
  </div>
</div>
@stop
