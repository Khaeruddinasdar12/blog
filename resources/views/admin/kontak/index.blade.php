@extends('layouts.template')

@section('title') Semua Pesan @endsection

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
						<h2 class="card-title"><i class="fa fa-envelope"></i> Semua Pesan</h2>
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
										<th>Judul</th>
										<th>Pesan</th>
										<th>Waktu</th>
									</tr>
								</thead>
								@php $no = 1 ; @endphp
								@foreach($data as $dt) 
								<tbody>
									<td>{{$no++}}</td>
									<td>{{$dt->nama}}</td>
									<td>{{$dt->email}}</td>
									<td>{{$dt->judul}}</td>
									<td>{{$dt->pesan}}</td>
									<td>{{$dt->created_at}}</td>
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
