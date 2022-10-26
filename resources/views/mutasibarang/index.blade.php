
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Data Stok Barang</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../../assets/img/icon.ico" type="image/x-icon"/>
	
	@include('layouts.header')
</head>
<body>
		@include('layouts.side')
		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="row">
                       
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
								<div class="d-flex align-items-center">
									<h4 class="card-title">Data Mutasi</h4>
								</div>
								</div>
                                
								<div class="card-body">
                                    <div class="input-group">
                                        <div class="input-icon">
											<form action="{{url('getmutasi')}}" method="GET">
                                            <input type="search" name="cari" class="form-control" placeholder="Search for...">
                                            <span class="input-icon-addon">
                                                <button type="submit" class="btn-primary btn-xs fa fa-search"></button>
                                            </span>
											</form>
                                        </div>
                                    </div>
                                    </br>
									<table class="table table-bordered">
										<thead>
											<tr>
												<th scope="col">No</th>
												<th scope="col">Tanggal</th>
												<th scope="col">Nama Barang</th>
												<th scope="col">Kegiatan</th>
                                                <th scope="col">Jumlah</th>
                                                <th scope="col">Stok Akhir</th>
                                                <th scope="col">Status</th>
												<th scope="col">Keterangan</th>
											</tr>
										</thead>
										<tbody>
                                            @php $no=1; @endphp
                                            @foreach ($second as $row)
											<tr>
												<td>{{$no++}}</td>
												<td>{{$row->tgl}}</td>
												<td>{{$row->nama_barang}}</td>
												<td>-</td>
                                                <td>{{$row->jumlah}}</td>											
                                                <td>{{$row->stokbarang}}</td>
                                                <td>@if($row->status == '1') 
													<span class="badge badge-success">Berhasil</span>
													@else
													<span class="badge badge-danger">Pending</span>
													@endif
												</td>
												<td>-</td>
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
		</div>
		
		
	</div>
	@include('layouts.script')
	@include('sweetalert::alert')
	<!-- Datatables -->
	
		
		

		<script>
		$(document).ready(function() {
			

			

			
		});
	</script>
</body>
</html>