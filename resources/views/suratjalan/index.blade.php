
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Surat Jalan</title>
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
									<h4 class="card-title">Surat Jalan</h4>
								</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="basic-datatables" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th width="100px">No</th>
													<th>Nomor Surat</th>
                                                    <th>Tanggal</th>
												
                                                    <th>Tujuan</th>
                                                    <th>Driver</th>
													<th width="100px">Action</th>
												</tr>
											</thead>
											<tbody>
												@php $no = 1; @endphp
												@foreach ($suratjalan as $row)
												<tr>
													<td>{{$no++}}</td>
													<td>{{$row->no_surat}}</td>
                                                    <td>{{$row->tgl}}</td>
                                                    <td>{{$row->nama_pelanggan}}</td>
                                                    <td>{{$row->driver}}</td>
													<td>
														<div class="form-button-action">
															<button type="button" onclick="window.location.href='/suratjalancetak/{{ $row->no_trx }}'" class="btn btn-primary btn-sm">
																Cetak
														    </button>
														</div>
													</td>
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
	
	<script>
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