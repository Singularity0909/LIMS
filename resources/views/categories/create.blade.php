@extends('layouts.default')
@section('title', 'Create a category')

@section('content')
<div class="offset-md-2 col-md-8">
  <div class="card">
    <div class="card-header">
      <h5>Create a category</h5>
    </div>
    <div class="card-body">

      @include('shared._errors')

      <form method="POST" action="{{ route('categories.store') }}">
        {{ csrf_field() }}

        <div class="form-group">
          <label for="name">Name: </label>
          <input type="text" name="name" class="form-control" value="{{ old('name') }}">
        </div>

        <button type="submit" class="btn btn-primary">
          <i class="fa fa-plus fa-fw fa-lg"></i> Create
        </button>
      </form>
    </div>
  </div>
</div>
@stop
