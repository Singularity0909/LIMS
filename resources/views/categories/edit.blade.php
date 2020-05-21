@extends('layouts.default')
@section('title', 'Update category info')

@section('content')
<div class="offset-md-2 col-md-8">
  <div class="card ">
    <div class="card-header">
      <h5>Update category info</h5>
    </div>
      <div class="card-body">

        @include('shared._errors')

        <form method="POST" action="{{ route('categories.update', $category->id )}}">
          {{ method_field('PATCH') }}
          {{ csrf_field() }}

          <div class="form-group">
            <label for="id">ID: </label>
            <input type="text" name="id" class="form-control" value="{{ $category->id }}" disabled>
          </div>

          <div class="form-group">
            <label for="name">Name: </label>
            <input type="text" name="name" class="form-control" value="{{ $category->name }}">
          </div>

          <button type="submit" class="btn btn-primary">
            <i class="fa fa-cog fa-fw fa-lg"></i> Update
          </button>
        </form>
    </div>
  </div>
</div>
@stop
