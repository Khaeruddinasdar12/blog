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

        {!! $data->isi !!}
        <div class="container pt-4 pb-4">
          <div class="border p-5 bg-lightblue mt-5">
            <div class="row justify-content-center">
              <div class="container pt-4 pb-4">
                <div class="col-md-12">
                  <h5 class="font-weight-bold secondfont">Komentar : </h5>
                  <div class="form-group">
                    <label><strong>Nama : </strong></label>
                    <input type="text" class="form-control" placeholder="Nama Lengkap">
                  </div>
                  <div class="form-group">
                    <label><strong>Email :</strong> </label>
                    <input type="email" class="form-control" placeholder="Email aktif">
                  </div>
                  <div class="form-group">
                    <label><strong>Komentar :</strong> </label>
                    <textarea placeholder="Komentar Anda" class="form-control" rows="4"></textarea>
                  </div>
                  <button type="submit" class="btn btn-success btn-block">Kirim Komentar</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>

  
  <!-- End Main -->
</div>
