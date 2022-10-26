
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Data Stok</title>
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
                        <div class="col-sm-6 col-md-3">
							<div class="card card-stats card-primary card-round">
								<div class="card-body">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="flaticon-success"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category">Stok Tersedia</p>
												<h4 class="card-title">{{$stok}}</h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
                        <div class="col-sm-6 col-md-3">
							<div class="card card-stats card-info card-round">
								<div class="card-body">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="flaticon-analytics"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category">Barang Keluar</p>
												<h4 class="card-title">{{$barangkeluar}}</h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="card card-stats card-success card-round">
								<div class="card-body ">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="flaticon-analytics"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category">Barang Masuk</p>
												<h4 class="card-title">{{$barangmasuk}}</h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="card card-stats card-secondary card-round">
								<div class="card-body ">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="flaticon-analytics"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category">Jumlah Produk</p>
												<h4 class="card-title">{{$barang}}</h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
								<div class="d-flex align-items-center">
									<h4 class="card-title">Data Stok Barang</h4>
								</div>
								</div>
                                
								<div class="card-body">
                                    <div class="input-group">
                                        <div class="input-icon">
											<form action={{url('caristok')}} method="GET">
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
												<th scope="col">SKU</th>
												<th scope="col">Nama Barang</th>
												<th scope="col">Merek</th>
                                                <th scope="col">Stok Keluar</th>
                                                <th scope="col">Stok Masuk</th>
                                                <th scope="col">Stok Aktual</th>
											</tr>
										</thead>
										<tbody>
                                            @php $no=1; @endphp
                                            @foreach ($datastok as $row)
											<tr>
												<td>{{$no++}}</td>
												<td>{{$row->sku}}</td>
												<td>{{$row->nama}}</td>
												<td>{{$row->nama_brand}}</td>
                                                <td></td>
                                                <td></td>
                                                <td>{{$row->stok}}</td>
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