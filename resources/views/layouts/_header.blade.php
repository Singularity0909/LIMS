<nav class="navbar navbar-expand-lg navbar-dark bg-info">
  <div class="container ">
    <a class="navbar-brand logo" href="{{ route('home') }}">LIMS</a>
    <ul class="navbar-nav justify-content-end">
      @if (Auth::check())
        @if (in_array(App\Models\User::getRole(Auth::user()), ['Superuser', 'Readers admin']))
          <li class="nav-item"><a class="nav-link" href="{{ route('indexReaders') }}">Manage readers</a></li>
        @endif
        @if (App\Models\User::getRole(Auth::user()) == 'Superuser')
          <li class="nav-item"><a class="nav-link" href="{{ route('indexAdmins') }}">Manage admins</a></li>
        @endif
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ Auth::user()->name }}
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('users.show', Auth::user()) }}">Personal info</a>
            <a class="dropdown-item" href="{{ route('users.edit', Auth::user()) }}">Modify profile</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" id="logout" href="#">
              <form action="{{ route('logout') }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button class="btn btn-block btn-danger" type="submit" name="button">Logout</button>
              </form>
            </a>
          </div>
        </li>
      @else
        <li class="nav-item" ><a class="nav-link" href="{{ route('login') }}">Login</a></li>
      @endif
    </ul>
  </div>
</nav>
