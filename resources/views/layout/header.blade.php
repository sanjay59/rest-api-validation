<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="{{url('/')}}">Laravel</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="{{url('/')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/')}}/register">Register</a>
          </li>
          @if (Session::get('id'))
          <li class="nav-item">
            <a class="nav-link " href="{{url('/')}}/users">Users</a>
          </li>
         
           @else
           <li class="nav-item">
            <a class="nav-link " href="{{url('/')}}/login">Login</a>
          </li>
          @endif
        </ul>
        <form class="form-inline mt-2 mt-md-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        @if (Session::get('id'))
        <ul class="navbar-nav">
           <li class="nav-item">
            <a class="nav-link " href="{{url('/')}}/logout">Logout</a>
          </li>
        </ul>
        @endif
      </div>
    </nav>
  </header>