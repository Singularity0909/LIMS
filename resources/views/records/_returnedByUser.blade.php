<tr>
  <td>{{ $record->bid }}</td>
  <td>
    <a href="{{ route('books.show', $record->isbn) }}">{{ $record->isbn }}</a>
  </td>
  <td>
    <a href="{{ route('books.show', $record->isbn) }}">{{ $record->title }}</a>
  </td>
  <td>{{ $record->lent_at }}</td>
  <td>{{ $record->returned_at }}</td>
</tr>
