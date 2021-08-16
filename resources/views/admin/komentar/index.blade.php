@extends('layouts.template')

@section('title') Komentar @endsection

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header card-secondary card-outline">
						<h2 class="card-title"><i class="fa fa-comments"></i> Semua Komentar</h2>
						<div class="card-tools">
							<button type="button" class="btn btn-tool" data-card-widget="collapse">
								<i class="fas fa-minus"></i>
							</button>
						</div>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<div class="table-responsive-sm">
							<table id="tabel_kategori" class="table table-bordered" style="width:100% !important; ">
								<thead>
									<tr>
										<th>No.</th>
										<th>Nama</th>
										<th>Email</th>
										<th>Waktu</th>
										<th>Komentar</th>
										<th>Blog</th>
									</tr>
								</thead>
								@php $no = 1 ; @endphp
								@foreach($data as $dt) 
								<tbody>
									<td>{{$no++}}</td>
									<td>{{$dt->nama}}</td>
									<td>{{$dt->email}}</td>
									<td>{{$dt->created_at}}</td>
									<td>{{$dt->komentar}}</td>
									<td>{{$dt->blog->judul}}</td>
								</tbody> 
								@endforeach
							</table>
						</div>
						{{$data->links()}}
					</div>
				</div>
			</div>
		</div>
	</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
