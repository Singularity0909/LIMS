@extends('layouts.default')
@section('title', 'Return a book')

@section('content')
<div class="offset-md-2 col-md-8">
  <div class="card">
    <div class="card-header">
      <h5>Return a book (simulation)</h5>
    </div>
    <div class="card-body">

      @include('shared._errors')

      <form method="POST" action="{{ route('returned.store') }}">
        {{ csrf_field() }}

        <div class="form-group">
          <label for="bid">Book ID: </label>
          <input type="text" name="bid" class="form-control" value="{{ old('bid') }}">
        </div>

        <button type="submit" class="btn btn-primary">
          <i class="fa fa-plus fa-fw fa-lg"></i> Return
        </button>
      </form>
    </div>
  </div>
</div>
@stop
