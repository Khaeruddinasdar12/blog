<div>
  <div class="container pt-4 pb-4">
    <div class="row justify-content-center">
      <h1 class="font-weight-bold secondfont">Semua Blog</h1>
    </div>
  </div>
  <div class="container">
    <div class="row justify-content-between">
      <div class="col-md-8">
        <h5 class="font-weight-bold spanborder"><span>Semua Kategori</span></h5>

        @foreach($data as $dt)
        <div class="mb-3 d-flex justify-content-between">
          <div class="pr-3">
            <h2 class="mb-1 h4 font-weight-bold">
              <a class="text-dark" href="blog/{{$dt->kategori->nama}}/{{$dt->slug}}">{{$dt->judul}}</a>
            </h2>
            <p>
            </p>
            <small class="text-muted">{{$dt->created_at}} &middot; by {{$dt->user->name}}</small>
          </div>
          @if($dt->gambar != '')
          <img height="120" src="{{ asset('storage/'. $dt->gambar) }}">
          @else
          <img height="120" src="{{ asset('picture.png') }}">
          @endif
        </div>
        <hr>
        @endforeach
        
        {{$data->links()}}
      </div>

      <div class="col-md-4 pl-4">
        <h5 class="font-weight-bold spanborder"><span>Terbaru</span></h5>
        <ol class="list-featured">
          @foreach($terbaru as $dt)
          <li>
            <span>
              <h6 class="font-weight-bold">
                <a href="blog/{{$dt->kategori->nama}}/{{$dt->slug}}" class="text-dark">{{$dt->judul}}</a>
              </h6>
              <p class="text-muted">
                {{$dt->user->name}}
              </p>
            </span>
          </li>
          @endforeach
        </ol>
      </div>
    </div>
  </div>

</div>
