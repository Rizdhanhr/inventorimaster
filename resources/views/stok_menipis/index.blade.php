
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
									<h4 class="card-title">Stok Menipis</h4>
								</div>
								</div>
                                
								<div class="card-body">
									<table class="table table-bordered">
										<thead>
											<tr>
												<th scope="col">No</th>
												<th scope="col">Kode</th>
												<th scope="col">Nama Barang</th>
												<th scope="col">Stok</th>
                                                <th scope="col">Opsi</th>
											</tr>
										</thead>
										<tbody>
                                            @php $no=1; @endphp
                                            @foreach ($barang as $row)
											<tr>
												<td>{{$no++}}</td>
												<td>{{$row->sku}}</td>
												<td>{{$row->nama}}</td>
												<td>{{$row->stok}}</td>
                                                <td></td>											
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