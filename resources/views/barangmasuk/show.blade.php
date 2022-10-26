
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Barang</title>
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
									<h4 class="card-title">Detail Barang Masuk</h4>
									
								</div>
								</div>
								<div class="card-body">
									<table class="table table-bordered">
										<thead>
											<tr>
												<th scope="col">No</th>
												<th scope="col">Nama Barang</th>
												<th scope="col">Tanggal</th>
												<th scope="col">Jumlah</th>
											</tr>
										</thead>
										<tbody>
                                            @php $no=1; @endphp
                                            @foreach ($detail as $row)
											<tr>
												<td>{{$no++}}</td>
												<td>{{$row->nama_barang}}</td>
												<td>{{$row->tgl}}</td>
												<td>{{$row->jumlah}}</td>
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
	<script src="{{asset('template')}}/assets/js/plugin/datatables/datatables.min.js"></script>
	
	<script >
		$(document).ready(function() {
			

			

			
		});
	</script>
</body>
</html>