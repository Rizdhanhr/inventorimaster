
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
									<h4 class="card-title">Barang</h4>
									<a href="{{route('barang.create')}}" class="btn btn-primary btn-round ml-auto">
											<i class="fa fa-plus"></i>
											Add Row
										</a>
								</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="basic-datatables" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th width="100px">Action</th>
													<th width="50px">No</th>
													<th>SKU</th>
													<th>Nama</th>
													<th>Kategori</th>
													<th>Brand</th>
													<th>Satuan</th>
												</tr>
											</thead>
											<tbody>
												@php $no = 1; @endphp
												@foreach ($barang as $row)
												<tr>
												<td>
														<div class="form-button-action">
														<button type="button" class="btn btn-success btn-xs" onclick="window.location.href='{{ route('barang.show',$row->id) }}'"><i class='fa fa-eye'></i></button>
														&nbsp;
														<button type="button" class="btn btn-primary btn-xs" onclick="window.location.href='{{ route('barang.edit',$row->id) }}'"><i class='fa fa-edit'></i></button>
														&nbsp;
															<!-- <form action="{{ route('barang.edit',$row->id) }}" method="GET">
																@csrf
															<button type="submit" class="btn btn-primary btn-block" ><i class="fa fa-edit"></i></button>
															<form>
															&nbsp; -->
															<!-- <a type="button" data-toggle="tooltip" href="{{ route('barang.edit',$row->id) }}" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
																<i class="fa fa-edit"></i>
														    </a> -->
															<form action="{{ route('barang.destroy',$row->id) }}" method="POST">
															@csrf
                    										@method('DELETE')
															<button type="submit" onclick="return confirm('Apakah anda ingin menghapus data ini?')" class="btn btn-danger btn-xs" ><i class="fa fa-trash"></i></button>
															<!-- <button type="submit" onclick="return confirm('Apakah anda ingin menghapus data ini?')" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
																<i class="fa fa-times"></i>
															</button> -->
															</form>
														</div>
													</td>
													<td>{{$no++}}</td>
													<td>{{$row->sku}}</td>
													<td width="200px">{{$row->nama}}</td>
													<td>{{$row->nama_kategori}}</td>
													<td>{{$row->nama_brand}}</td>
													<td>{{$row->nama_satuan}}</td>
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
		
		
	</div>
	@include('layouts.script')
	@include('sweetalert::alert')
	<!-- Datatables -->
	<script src="{{asset('template')}}/assets/js/plugin/datatables/datatables.min.js"></script>
	
	<script >
		$(document).ready(function() {
			$('#basic-datatables').DataTable({
			});

			$('#multi-filter-select').DataTable( {
				"pageLength": 5,
				initComplete: function () {
					this.api().columns().every( function () {
						var column = this;
						var select = $('<select class="form-control"><option value=""></option></select>')
						.appendTo( $(column.footer()).empty() )
						.on( 'change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
								);

							column
							.search( val ? '^'+val+'$' : '', true, false )
							.draw();
						} );

						column.data().unique().sort().each( function ( d, j ) {
							select.append( '<option value="'+d+'">'+d+'</option>' )
						} );
					} );
				}
			});

			// Add Row
			$('#add-row').DataTable({
				"pageLength": 5,
			});

			var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

			
		});
	</script>
</body>
</html>