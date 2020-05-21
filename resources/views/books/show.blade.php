@extends('layouts.default')
@section('title', $book->title)

@section('content')
<div class="row">
  <div class="offset-md-2 col-md-8">
    <div class="col-md-12">
      <div class="offset-md-2 col-md-8">
        <section class="user_info">
          @include('shared._book_info', ['book' => $book])
        </section>
      </div>
    </div>
  </div>
</div>
@stop
