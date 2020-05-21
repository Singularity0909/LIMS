<div class="list-group-item">
  <img class="mr-3" src="{{ $book->cover }}" height=32>
  <a href="{{ route('books.show', $book->isbn) }}">{{ $book->title }} - {{ $book->author }}</a>
  {{ $book->available }}/{{ $book->total }}
  @if (in_array(App\Models\User::getRole(Auth::user()), ['Superuser', 'Books admin']))
    <form action="{{ route('books.destroy', $book->isbn) }}" method="post" class="float-right">
      {{ csrf_field() }}
      {{ method_field('DELETE') }}
      <button type="submit" class="btn btn-sm btn-danger delete-btn">
        <i class="fa fa-trash-o fa-lg"></i> Delete</a>
      </button>
    </form>
    <form action="{{ route('books.edit', $book->isbn) }}" method="get" class="float-right">
      <button type="submit" class="btn btn-sm btn-secondary update-btn">
        <i class="fa fa-cog"></i> Update</a>
      </button>
    </form>
  @endif
</div>
