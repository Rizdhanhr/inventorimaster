
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Barang Masuk</title>
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
									<h5 class="card-title mb-2 fw-mediumbold">Form Stok Masuk</h5>
									<form action="{{route('barangmasuk.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
									<div class="form-group">
                                        <label for="exampleInputEmail1">Pilih Barang</label>
                                        <select onchange="getnama(this.value)" id="barang" name="barang" class="form-control" aria-label="Default select example">
                                            <option selected>Pilih Barang</option>
                                            @foreach ($barang as $row)
                                            <option value="{{$row->id}}">{{$row->nama}}</option>
                                            @endforeach
                                        </select>
                                    </div>
									
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Produk</label>
                                        <input type="text" class="form-control" id="nama" name="nama" readonly>
                                    </div>
									<div class="form-group">
                                        <label for="exampleInputEmail1">Stok Tersedia</label>
                                        <input type="text" class="form-control" id="stock" name="stock" readonly>
                                    </div>
									<div class="form-group">
                                        <label for="exampleInputEmail1">Jumlah</label>
                                        <input type="text" class="form-control" name="jumlah" required>
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
									<h5 class="card-title mb-2 fw-mediumbold">Daftar Masuk</h5>
									<table class="table mt-3">
										<thead>
											<tr>
												<th scope="col">No</th>
												<th scope="col">Nama Barang</th>
												<th scope="col">Jumlah Masuk</th>
												<th scope="col">Opsi</th>
											</tr>
										</thead>
										<tbody>
										@php $no = 1; @endphp
										@foreach ($barangmasuk as $row)
											<tr>
												<td>{{ $no++ }}</td>
												<td>{{$row->nama_barang}}</td>
												<td>{{$row->jumlah}}</td>
												<td>
															<form action="" method="POST">
															@csrf
                    										@method('DELETE')
															<button type="submit" onclick="return confirm('Apakah anda ingin menghapus data ini?')" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
																<i class="fa fa-times"></i>
															</button>
															</form>
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
									<hr/>
									<form action="{{URL::to('/')}}/barangmasukupdate" method="POST">
									@csrf
									<div class="form-group">
                                        <label for="exampleInputEmail1">Supplier :</label>
                                        <select id="supplier" name="supplier" class="form-control" aria-label="Default select example">
                                            <option selected>Pilih Supplier</option>
                                            @foreach ($supplier as $row)
                                            <option value="{{$row->id}}">{{$row->nama}}</option>
                                            @endforeach
                                        </select>
                                    </div>
									<div class="form-group">
										<label for="exampleInputEmail1">Tanggal :</label>
										<input type="date" name="tanggal" class="form-control">
									</div>
									<div class="form-group">
									<button type="submit"  class="btn btn-success" class="form-control">Simpan</bitton>
									<div>
									</div>
								</form>
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
					url: "/getbarang/"+ $id ,
					success: function(data){
					// console.log(data['nama']);
					$("#nama").val(data['nama']);
					$("#stock").val(data['stok']);
					},
				});
				
			}

		
		</script>
  
</body>
</html>