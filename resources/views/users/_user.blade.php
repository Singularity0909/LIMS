<div class="list-group-item">
  <img class="mr-3" src="{{ $user->gravatar() }}" alt="{{ $user->name }}" width=32>
  <a href="{{ route('users.show', $user) }}">{{ $user->id }} - {{ $user->name }}</a>
  <form action="{{ route('users.destroy', $user->id) }}" method="post" class="float-right">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <button type="submit" class="btn btn-sm btn-danger delete-btn">
      <i class="fa fa-trash-o fa-lg"></i> Delete</a>
    </button>
  </form>
  <form action="{{ route('users.edit', $user->id) }}" method="get" class="float-right">
    <button type="submit" class="btn btn-sm btn-secondary update-btn">
      <i class="fa fa-cog"></i> Update</a>
    </button>
  </form>
</div>
