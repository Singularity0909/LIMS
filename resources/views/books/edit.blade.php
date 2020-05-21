@extends('layouts.default')
@section('title', 'Update book info')

@section('content')
<div class="offset-md-2 col-md-8">
  <div class="card ">
    <div class="card-header">
      <h5>Update book info</h5>
    </div>
      <div class="card-body">

        @include('shared._errors')

        <form method="POST" action="{{ route('books.update', $book->isbn )}}">
          {{ method_field('PATCH') }}
          {{ csrf_field() }}

          <div class="form-group">
            <label for="isbn">ISBN: </label>
            <input type="text" name="isbn" class="form-control" value="{{ $book->isbn }}" disabled>
          </div>

          <div class="form-group">
            <label for="title">Title: </label>
            <input type="text" name="title" class="form-control" value="{{ $book->title }}">
          </div>

          <div class="form-group">
            <label for="category">Cetegory: </label><br>
            <select name="category" class="combobox form-control">
              <option value="{{ $book->category }}">{{ App\Models\Category::where('id', $book->category)->first()['name'] }}</option>
              @foreach ($categories as $category)
                @if ($category->id != $book->category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endif
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label for="author">Author: </label>
            <input type="text" name="author" class="form-control" value="{{ $book->author }}">
          </div>

          <div class="form-group">
            <label for="publisher">Publisher: </label>
            <input type="text" name="publisher" class="form-control" value="{{ $book->publisher }}">
          </div>

          <div class="form-group">
            <label for="cover">Cover: </label>
            <input type="text" name="cover" class="form-control" value="{{ $book->cover }}">
          </div>

          <div class="form-group">
            <label for="intro">Intro: </label>
            <input type="text" name="intro" class="form-control" value="{{ $book->intro }}">
          </div>

          <div class="form-group">
            <label for="price">Price: </label>
            <input type="text" name="price" class="form-control" value="{{ $book->price }}">
          </div>

          <div class="form-group">
            <label for="total">Total: </label>
            <input type="text" name="total" class="form-control" value="{{ $book->total }}" disabled>
          </div>

          <div class="form-group">
            <label for="available">Available: </label>
            <input type="text" name="available" class="form-control" value="{{ $book->available }}" disabled>
          </div>

          <div class="form-group">
            <label for="location">Location: </label>
            <input type="text" name="location" class="form-control" value="{{ $book->location }}">
          </div>

          <button type="submit" class="btn btn-primary">
            <i class="fa fa-cog fa-fw fa-lg"></i> Update
          </button>
        </form>
    </div>
  </div>
</div>
@stop
