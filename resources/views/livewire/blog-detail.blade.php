<div>

  <div class="container pt-4 pb-4">
    <div class="row justify-content-center">
      <h1 class="font-weight-bold secondfont">{{$data->judul}}
      </h1>
    </div>
    <div class="row justify-content-center">
      <small class="text-muted">{{$data->created_at}} &middot; by {{$data->user->name}}</small>
    </div>
    <br>
    <br>
    <div class="row justify-content-center">
      <img height="300" src="{{ asset('storage/'.$data->gambar) }}">
    </div>
  </div>

  <!--MAIN-->    
  <div class="container pt-4 pb-4">
    <div class="row justify-content-center">
      <div class="col-md-12 col-lg-8">
        <p class="text-muted">Kategori : <a href="../{{$data->kategori->nama}}">{{$data->kategori->nama}}</a></p>
        
        {!! $data->isi !!}

        <div class="container pt-4 pb-4">
          <div class="border p-5 bg-lightblue mt-5">
            <div class="row justify-content-center">
              <div class="container pt-4 pb-4">
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
                <form wire:submit.prevent="saveKomentar({{$data->id}})">

                <div class="col-md-12">
                  <h5 class="font-weight-bold secondfont">Komentar : </h5>
                  <div class="form-group">
                    <label><strong>Nama : </strong></label>
                    <input type="text" class="form-control" placeholder="Nama Lengkap" wire:model="nama">
                  </div>
                  <div class="form-group">
                    <label><strong>Email :</strong> </label>
                    <input type="email" class="form-control" placeholder="Email aktif" wire:model="email">
                  </div>
                  <div class="form-group">
                    <label><strong>Komentar :</strong> </label>
                    <textarea placeholder="Komentar Anda" class="form-control" rows="4" wire:model="komentar"></textarea>
                  </div>
                  <button type="submit" class="btn btn-success btn-block">Kirim Komentar</button>
                </div>
              </form>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>

  
  <!-- End Main -->
</div>
