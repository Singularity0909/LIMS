<tr>
  <td>{{ $record->bid }}</td>
  <td>
    <a href="{{ route('users.show', $record->uid) }}">{{ $record->uid }}</a>
  </td>
  <td>
    <a href="{{ route('users.show', $record->uid) }}">{{ $record->name }}</a>
  </td>
  <td>{{ $record->lent_at }}</td>
  <td>{{ $record->returned_at }}</td>
</tr>
