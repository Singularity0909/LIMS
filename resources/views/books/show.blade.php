@extends('layouts.default')
@section('title', $book->title)

@section('content')
<div style="display: flex; flex-direction: row">
  <div class="offset-md-1 col-md-4 align-self-center">
    <img src="{{ $book->cover }}" width="250px"/>
  </div>

    <div class="col-md-8">
      <div class="offset-md-2 col-md-8">
        <section class="user_info">
          @include('shared._book_info', ['book' => $book])
        </section>
      </div>
    </div>

</div>
@stop
