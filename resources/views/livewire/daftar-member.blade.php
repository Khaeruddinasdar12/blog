<div>
  <!--MAIN-->    
  <div class="container pt-4 pb-4">
    <div class="row justify-content-center">
      <h1 class="font-weight-bold secondfont">Daftakan diri Anda sebagai Member</h1>
    </div>

    <div class="row justify-content-center">
      <div class="col-md-12 col-lg-8">
        <div class="border p-5 bg-lightblue mt-5">
          <div class="row justify-content-between align-items-center">
            <div class="col-md-12 mb-2 mb-md-0">
              <h5 class="font-weight-bold secondfont">Daftar Member</h5>
              <p>Dengan mengirimkan email ANda kepada kami, Anda akan mendapatkan pesan melalui email setiap kami merilis artikel baru. Kami berkomitmen untuk tidak melakukan spam dan akan menjamin data Anda. </p>
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

              <form wire:submit.prevent="saveMember">
              <div class="col-md-12">
                <div class="form-group">
                  <label><strong>Email :</strong> </label>
                  <input type="email" class="form-control" placeholder="Email aktif"wire:model="email">
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
