<div class="list-group-item">
  <img class="mr-3" src="{{ $user->gravatar() }}" alt="{{ $user->name }}" width=32>
  <a href="{{ route('users.show', $user) }}">{{ $user->id }} {{ $user->name }}</a>
  <form action="{{ route('users.destroy', $user->id) }}" method="post" class="float-right">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <button type="submit" class="btn btn-sm btn-danger delete-btn">Delete</button>
  </form>
  <form action="{{ route('users.edit', $user->id) }}" method="get" class="float-right">
    <button type="submit" class="btn btn-sm btn-secondary update-user-btn">Modify</button>
  </form>
</div>
