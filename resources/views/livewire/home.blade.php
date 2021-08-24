<div>
    <!--------------------------------------
HEADER
--------------------------------------->
<div class="container">
  <div class="jumbotron jumbotron-fluid mb-3 pt-0 pb-0 bg-lightblue position-relative">
    <div class="pl-4 pr-0 h-100 tofront">
      <div class="row justify-content-between">
        <div class="col-md-6 pt-6 pb-6 align-self-center">
          <h1 class="secondfont mb-3 font-weight-bold">Sekilas Tentang Penulis,</h1>
          <p class="mb-3">
            Seluruh halaman yang ada diblog ini ditulis dan dikelola oleh Khaeruddin Asdar, pernah berkuliah di Universitas Dipa Makassar dan sekarang menjadi freelancer dibidang SEO Specialist dan pembuatan website. Mengikuti berbagai macam kegiatan lainnya demi menambah wawasan dan siap belajar lebih banyak lagi.
          </p>
          <a href="/about" class="btn btn-dark">Selengkapnya</a>
        </div>
        <div class="col-md-6 d-none d-md-block pr-0" style="background-size:cover;background-image:url({{ asset('front/assets/img/picture-min.jpg') }} );">   
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Header -->

<div class="container">
  <div class="row justify-content-between">
    <div class="col-md-8">
      <h5 class="font-weight-bold spanborder"><span>Blog Terbaru</span></h5>
      @foreach($data as $dt)
      <div class="mb-3 d-flex justify-content-between">
        <div class="pr-3">
          <h2 class="mb-1 h4 font-weight-bold">
            <a class="text-dark" href="blog/{{$dt->kategori->nama}}/{{$dt->slug}}">{{$dt->judul}}</a>
          </h2>
          <p>
            {!! substr($dt->isi, 0, 20) !!}
          </p>
          <small class="text-muted">{{$dt->created_at}} &middot; by {{$dt->user->name}}</small>
        </div>
        <img height="120" src="{{ asset('storage/'. $dt->gambar) }}">
      </div>
      <hr>
      @endforeach
      
    </div>
    <div class="col-md-4 pl-4">
      <h5 class="font-weight-bold spanborder"><span>Portfolio Terbaru</span></h5>
      <ol class="list-featured">
        <li>
          <span>
            <h6 class="font-weight-bold">
              <a href="./article.html" class="text-dark">Ikadipa App</a>
            </h6>
            <p class="text-muted">
              November 2021 - Desember 2021
            </p>
          </span>
        </li>
        <li>
          <span>
            <h6 class="font-weight-bold">
              <a href="./article.html" class="text-dark">Cr App</a>
            </h6>
            <p class="text-muted">
              November 2021 - Desember 2021
            </p>
          </span>
        </li>
        <li>
          <span>
            <h6 class="font-weight-bold">
              <a href="./article.html" class="text-dark">BoneKurir App</a>
            </h6>
            <p class="text-muted">
              November 2021 - Desember 2021
            </p>
          </span>
        </li>
      </ol>
    </div>
  </div>
  <div class="row justify-content-between">
    <div class="col-md-8">
      @if (count($errors) > 0)
      <div class="alert alert-danger alert-dismissible fade show">
        <ul class="list-unstyled">
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
      @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Sukses!</strong> {{session('success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
      <div class="border p-5 bg-lightblue">
        <div class="row justify-content-between">
          <div class="col-md-5 mb-2 mb-md-0">
            <h5 class="font-weight-bold secondfont">Member gratis</h5>
            Dapatkan artikel terbaru dengan menjadi member. kami tidak pernah spam !
          </div>
          <div class="col-md-7">
            <form wire:submit.prevent="saveMember">
              <div class="row">
                <div class="col-md-12">
                  <input type="text" class="form-control" placeholder="Masukkan alamat e-mail" wire:model="email">
                </div>
                <div class="col-md-12 mt-2">
                  <button type="submit" class="btn btn-success btn-block">Subscribe</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
