
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Surat Jalan</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="{{asset('template')}}/assets/img/icon.ico" type="image/x-icon"/>
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body>
		
        @include('layouts.header')
		<!-- Sidebar -->
		@include('layouts.side')
        
		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
						<div class="row">
							<div class="col-sm-6">
								<div class="card">
									<div class="card-body">
									<h5 class="card-title mb-2 fw-mediumbold">Form Surat Jalan</h5>
									<form action="" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
									<div class="form-group">
										<label for="exampleInputEmail1">No Surat</label>
										<input type="text" class="form-control" value="{{ 'SRT-'.$kd}}" name="no_surat" readonly>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Tanggal</label>
										<input type="date" class="form-control" name="tgl">
									</div>
									<div class="form-group">
                                        <label for="exampleInputEmail1">Pilih Pelanggan</label>
                                        <select onchange="getnama(this.value)" id="barang" name="barang" class="form-control" aria-label="Default select example">
                                            <option selected>Pilih Pelanggan</option>
                                            @foreach ($pelanggan as $row)
                                            <option value="{{$row->id}}">{{$row->nama}}</option>
                                            @endforeach
                                        </select>
                                    </div>
									
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tujuan</label>
                                        <input type="text" class="form-control" id="nama" name="nama" readonly>
                                    </div>
									<div class="form-group">
                                        <label for="exampleInputEmail1">No Telp</label>
                                        <input type="text" class="form-control" id="no" name="no" readonly>
                                    </div>
									<div class="form-group">
                                        <label for="exampleInputEmail1">Alamat</label>
                                        <input type="text" class="form-control" id="alamat"  name="alamat" readonly>
                                    </div>
									<div class="form-group">
                                        <label for="exampleInputEmail1">Driver/Kurir</label>
                                        <input type="text" class="form-control"   name="driver">
                                    </div>
									<div class="form-group">
                                        <label for="exampleInputEmail1">No Hp Driver/Kurir</label>
                                        <input type="text" class="form-control"   name="no_hp">
                                    </div>
									<div class="form-group">
                                        <label for="exampleInputEmail1">No Hp Driver/Kurir</label>
                                        <input type="text" class="form-control"   name="no_hp">
                                    </div>
									<div class="form-group">
                                        <label for="exampleInputEmail1">Nomor Polisi Kendaraan</label>
                                        <input type="text" class="form-control"   name="nopol">
                                    </div>
									<div class="form-group">
                                        <label for="exampleInputEmail1">Keterangan</label>
                                        <textarea class="form-control"   name="ket"></textarea>
                                    </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                    <div class="form-group">
                                    <button type="submit"  class="btn btn-primary">Tambahkan</button>
                                    </div>
                                    </div>
                                    </form>
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="card">
									<div class="card-body">
									<h5 class="card-title mb-2 fw-mediumbold">Daftar Barang</h5>
									<table class="table mt-3">
										<thead>
											<tr>
												<th scope="col">No</th>
												<th scope="col">Nama Barang</th>
												<th scope="col">Jumlah Keluar</th>
												
											</tr>
										</thead>
										<tbody>
											@php $no = 1; @endphp
											@foreach ($namabarang as $n)
											<tr>
												<td>{{$no++}}</td>
												<td>{{$n->nama_barang}}</td>
												<td>{{$n->jumlah}}</td>
											</tr>
											@endforeach
										</tbody>
									</table>
									
								</div>
							</div>
						</div>
				</div>
			</div>
		</div>
		<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
		@include('layouts.script')
		<script>
				$(document).ready(function() {
					$('#barang').select2();
				});

				function getnama($id){
				$.ajax({
					type: "GET",
					url: "/getpelanggan/"+ $id ,
					success: function(data){
					// console.log(data['nama']);
					$("#nama").val(data['nama']);
					$("#no").val(data['no']);
					$("#alamat").val(data['alamat']);
					},
				});
				
			}
		</script>
  
</body>
</html>