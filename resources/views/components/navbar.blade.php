    <!-- navbar -->
    <nav class="navbar navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="/">Creative Coder</a>
        <div class="d-flex align-items-center">
          @auth
          <a href="/" class="nav-link">Welcome {{auth()->user()->name}}</a>
          <img src="{{auth()->user()->avatar}}" width="40" height="40" class="rounded-circle">
          <form action="/logout" method="POST">
            @csrf
            <button class="btn btn-link">Logout</button>
          </form>
          @else
          <a href="/login" class="nav-link">Login</a>
          @endauth

          <a href="#home" class="nav-link">Home</a>
          <a href="#blogs" class="nav-link">Blogs</a>
          <a href="#subscribe" class="nav-link">Subscribe</a>
        </div>
      </div>
    </nav>