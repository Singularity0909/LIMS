<a href="{{ route('users.show', $user->id) }}">
  <img src="{{ $user->gravatar('140') }}" alt="{{ $user->name }}" class="gravatar"/>
</a>
<h1>{{ $user->name }}</h1>
<ul class="list-group text-left user-info-list">
  <li class="list-group-item">ID: {{ $user->id }}</li>
  <li class="list-group-item">Name: {{ $user->name }}</li>
  <li class="list-group-item">Email: {{ $user->email }}</li>
  <li class="list-group-item">Phone: {{ $user->phone }}</li>
  @if ($user->debt > 0)
    <form method="POST" action="{{ route('users.update', $user->id )}}">
      {{ method_field('PATCH') }}
      {{ csrf_field() }}
      <button type="submit" class="list-group-item active pay-btn" value=1 name="pay">Debt: {{ $user->debt }} (click to pay)</button>
    </form>
  @else
    <li class="list-group-item list-group-item-action">Debt: {{ $user->debt }}</li>
  @endif
  <li class="list-group-item">Role: {{ App\Models\User::getRole($user) }}</li>
</ul>
