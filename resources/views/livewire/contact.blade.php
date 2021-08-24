<div>
  <!--MAIN-->    
  <div class="container pt-4 pb-4">
    <div class="row justify-content-center">
      <h1 class="font-weight-bold secondfont">Contact</h1>
    </div>

    <div class="row justify-content-center">
      <div class="col-md-12 col-lg-8">
        <div class="border p-5 bg-lightblue mt-5">
          <div class="row justify-content-between align-items-center">
            <div class="col-md-12 mb-2 mb-md-0">
              <h5 class="font-weight-bold secondfont">Kontak</h5>
              <p>Segala kontak yang tertera adalah platform aktif yang digunakan oleh penulis, jangan sungkan bila ada keperluan. Berikut adalah kontak yang dapat Anda hubungi apabila merasa membutuhkan sesuatu dari penulis : </p>
              <ul>
                <li>Email : khaeruddinasdar12@gmail.com</li>
                <li>Phone : 0823 4494 9505</li>
                <li><a href="https://github.com/khaeruddinasdar12" target="_blank">Github : github.com/khaeruddinasdar12</a></li>
                <li><a href="https://twitter.com/AsdarCeddaKeru" target="_blank">Twitter : @AsdarCeddaKeru</a></li>
                <li><a href="https://www.facebook.com/profile.php?id=100009106886200" target="_blank">Facebook : Khaeruddin Asdar</a></li>
                <li><a href="https://www.instagram.com/khaeruddinasdar/" target="_blank">Instagram : khaeruddinasdar</a></li>
              </ul>
            </div>
          </div>
          <div class="row justify-content-between">
            <div class="col-md-12 mb-2 mb-md-0">
              <h5 class="font-weight-bold secondfont">Hubungi Kami !</h5>
              Masukkan data Anda pada form di bawah, <span class="text-danger"> kami tidak pernah spam!</span>
            </div>
          </div>
          <div class="row justify-content-between">
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

              <form wire:submit.prevent="savePesan()">
              <div class="col-md-12">
                <div class="form-group">
                  <label><strong>Nama : </strong></label>
                  <input type="text" class="form-control" placeholder="Nama Lengkap" wire:model="nama">
                </div>
                <div class="form-group">
                  <label><strong>Email :</strong> </label>
                  <input type="email" class="form-control" placeholder="Email aktif"wire:model="email">
                </div>
                <div class="form-group">
                  <label><strong>Judul :</strong> </label>
                  <input type="text" class="form-control" placeholder="Judul" wire:model="judul">
                </div>
                <div class="form-group">
                  <label><strong>Pesan :</strong> </label>
                  <textarea placeholder="Pesan Anda" class="form-control" rows="4" wire:model="pesan"></textarea>
                </div>
                <button type="submit" class="btn btn-success btn-block">Kirim Pesan</button>
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
