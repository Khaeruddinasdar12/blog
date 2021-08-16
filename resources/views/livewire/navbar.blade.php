
   <div class="topnav navbar navbar-expand-lg navbar-light bg-white fixed-top">
      <div class="container">
        <a class="navbar-brand" href="/"><strong>{{ config('app.name') }}</strong></a>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse collapse" id="navbarColor02" style="">
          <ul class="navbar-nav mr-auto d-flex align-items-center">
            <li class="nav-item">
              <a class="nav-link" href="/blog">Blog</a>
          </li>
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Blog Category
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                @foreach($data as $dt)
                <a class="dropdown-item" href="/blog/{{$dt->nama}}">{{$dt->nama}}</a>
                @endforeach
            </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/about">About</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="/contact">Contact</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="/contact">Portfolio</a>
      </li>
  </ul>
  <ul class="navbar-nav ml-auto d-flex align-items-center">
    <li class="nav-item highlight">
      <a class="nav-link" href="https://www.wowthemes.net/mundana-free-html-bootstrap-template/">Daftar Member</a>
  </li>
</ul>
</div>
</div>
</div>

