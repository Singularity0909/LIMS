<tr>
  <td>{{ $record->bid }}</td>
  <td>
    <a href="{{ route('books.show', $record->isbn) }}">{{ $record->isbn }}</a>
  </td>
  <td>
    <a href="{{ route('books.show', $record->isbn) }}">{{ $record->title }}</a>
  </td>
  <td>{{ $record->lent_at }}</td>
  <td>{{ $record->due_at }}</td>
  <td>
    <form action="{{ route('lent.edit', [$record->bid, $record->lent_at]) }}" method="get">
      {{ csrf_field() }}
      {{ method_field('UPDATE') }}
      @if ($record->renewed)
        <button type="submit" class="btn btn-sm btn-success" disabled>
      @else
        <button type="submit" class="btn btn-sm btn-success">
      @endif
        <i class="fa fa-plus fa-fw"></i> Renew</a>
      </button>
    </form>
  </td>
  <td>
    <form action="{{ route('lent.destroy', [$record->bid, $record->lent_at]) }}" method="post">
      {{ csrf_field() }}
      {{ method_field('DELETE') }}
      <button type="submit" class="btn btn-sm btn-danger">
        <i class="fa fa-minus fa-fw"></i> Report loss</a>
      </button>
    </form>
  </td>
</tr>
