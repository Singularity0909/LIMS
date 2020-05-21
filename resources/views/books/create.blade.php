@extends('layouts.default')
@section('title', 'Create a book')

@section('content')
<div class="offset-md-2 col-md-8">
  <div class="card">
    <div class="card-header">
      <h5>Create a book</h5>
    </div>
    <div class="card-body">

      @include('shared._errors')

      <form method="POST" action="{{ route('books.store') }}">
        {{ csrf_field() }}

        <div class="form-group">
          <label for="isbn">ISBN: </label>
          <input type="text" name="isbn" class="form-control" value="{{ old('ibsn') }}">
        </div>

        <div class="form-group">
          <label for="title">Title: </label>
          <input type="text" name="title" class="form-control" value="{{ old('title') }}">
        </div>

        <div class="form-group">
          <label for="category">Cetegory: </label><br>
          <select name="category" class="combobox form-control">
            <option></option>
            @foreach ($categories as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="author">Author: </label>
          <input type="text" name="author" class="form-control" value="{{ old('author') }}">
        </div>

        <div class="form-group">
          <label for="publisher">Publisher: </label>
          <input type="text" name="publisher" class="form-control" value="{{ old('publisher') }}">
        </div>

        <div class="form-group">
          <label for="cover">Cover: </label>
          <input type="text" name="cover" class="form-control" value="{{ old('cover') }}">
        </div>

        <div class="form-group">
          <label for="intro">Intro: </label>
          <input type="text" name="intro" class="form-control" value="{{ old('intro') }}">
        </div>

        <div class="form-group">
          <label for="price">Price: </label>
          <input type="text" name="price" class="form-control" value="{{ old('price') }}">
        </div>

        <div class="form-group">
          <label for="amount">Amount: </label>
          <input type="text" name="amount" class="form-control" value="{{ old('amount') }}">
        </div>

        <div class="form-group">
          <label for="location">Location: </label>
          <input type="text" name="location" class="form-control" value="{{ old('location') }}">
        </div>

        <button type="submit" class="btn btn-primary">
          <i class="fa fa-plus fa-fw fa-lg"></i> Create
        </button>
      </form>
    </div>
  </div>
</div>
@stop
