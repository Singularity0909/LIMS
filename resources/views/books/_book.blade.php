<tr>
  <td>
    <a href="{{ route('books.show', $book->isbn) }}">{{ $book->isbn }}</a>
  </td>
  <td>
    <a href="{{ route('books.show', $book->isbn) }}">{{ $book->title }}</a>
  </td>
  <td>{{ $book->author }}</td>
  <td>
    {{ App\Models\Category::where('id', '=', $book->category)->first()->name }}
  </td>
  <td>{{ $book->available }}</td>
  <td>{{ $book->total }}</td>
  @if (in_array(App\Models\User::getRole(Auth::user()), ['Superuser', 'Books admin']))
    <td>
      <form action="{{ route('books.edit', $book->isbn) }}" method="get">
        <button type="submit" class="btn btn-sm btn-secondary">
          <i class="fa fa-cog"></i> Update
        </button>
      </form>
    </td>
    <td>
      <form action="{{ route('books.destroy', $book->isbn) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button type="submit" class="btn btn-sm btn-danger">
          <i class="fa fa-trash-o fa-lg"></i> Delete
        </button>
      </form>
    </td>
  @endif
</tr>
