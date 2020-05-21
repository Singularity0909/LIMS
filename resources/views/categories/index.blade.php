@extends('layouts.default')
@section('title', 'Manage categories')

@section('content')
<div class="offset-md-2 col-md-8">
  <div class="index-title">
    <form action="{{ route('createCategory') }}" method="get">
      <button type="submit" class="btn btn-m btn-info create-btn">
        <i class="fa fa-plus"></i> Create</a>
      </button>
    </form>
    <h2 class="mb-4"> All categories</h2>
  </div>
  <div class="list-group list-group-flush index-list">
    @foreach ($categories as $category)
      @include('categories._category')
    @endforeach
  </div>

  <div class="mt-3">
    {!! $categories->render() !!}
  </div>
</div>
@stop
