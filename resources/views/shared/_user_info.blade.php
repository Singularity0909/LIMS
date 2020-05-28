<a href="{{ route('users.show', $user->id) }}">
  <img src="{{ $user->gravatar('140') }}" alt="{{ $user->name }}" class="gravatar"/>
</a>
<h1>{{ $user->name }}</h1>
<ul class="list-group text-left info-list">
  <li class="list-group-item list-group-item-action">
    <i class="fa fa-mortar-board fa-fw"></i>
    &nbsp;&nbsp;ID: {{ $user->id }}
  </li>
  <li class="list-group-item list-group-item-action">
    <i class="fa fa-id-card-o fa-fw"></i>
    &nbsp;&nbsp;Name: {{ $user->name }}
  </li>
  <li class="list-group-item list-group-item-action">
    <i class="fa fa-envelope-o fa-fw"></i>
    &nbsp;&nbsp;Email: {{ $user->email }}
  </li>
  <li class="list-group-item list-group-item-action">
    <i class="fa fa-phone fa-fw"></i>
    &nbsp;&nbsp;Phone: {{ $user->phone }}
  </li>
  @if ($user->debt > 0)
    <form method="POST" action="{{ route('users.update', $user->id )}}">
      {{ method_field('PATCH') }}
      {{ csrf_field() }}
      <button type="submit" class="list-group-item active pay-btn" value=1 name="pay">
        <i class="fa fa-dollar fa-fw"></i>
        &nbsp;&nbsp;Debt: ${{ $user->debt }} (click to pay)
      </button>
    </form>
  @else
    <li class="list-group-item list-group-item-action">
      <i class="fa fa-dollar fa-fw"></i>
      &nbsp;&nbsp;Debt: ${{ $user->debt }}
    </li>
  @endif
  <li class="list-group-item list-group-item-action">
    <i class="fa fa-user-o fa-fw"></i>
    &nbsp;&nbsp;Role: {{ App\Models\User::getRole($user) }}
  </li>
  <a class="list-group-item list-group-item-action" href="{{ route('records.index', array('uid' => $user->id, 'type' => '1')) }}">
    <i class="fa fa-history fa-fw"></i>
    &nbsp;&nbsp;Borrowed records
  </a>
  <a class="list-group-item list-group-item-action" href="{{ route('records.index', array('uid' => $user->id, 'type' => '2')) }}">
    <i class="fa fa-history fa-fw"></i>
    &nbsp;&nbsp;Returned records
  </a>
</ul>
