
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Kategori</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="{{asset('template')}}/assets/img/icon.ico" type="image/x-icon"/>
</head>
<body>
        @include('layouts.header')
		<!-- Sidebar -->
		@include('layouts.side')
        
		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Edit Kategori</h4>
									</div>
								</div>
								<div class="card-body">
                                    @foreach ($kategori as $row)
                                    <form action="{{route('kategori.update',$row->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="card-body">
                                    <input type="hidden" name="id" value="{{ $row->id }}">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Kategori</label>
                                        <input type="text" class="form-control" name="nama" value="{{$row->nama}}" required>
                                    </div>
                                        <input type="hidden" class="form-control" value="{{$row->created_by}}" name="created_by">
                                        <input type="hidden" class="form-control" value="{{$row->updated_by}}" name="updated_by">
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                    <div class="form-group">
                                    <button type="submit" onclick="return confirm('apakah anda ingin mengubah data ini?')" class="btn btn-primary">Update</button>
                                    </div>
                                    </div>
                                    </form>
                                    @endforeach
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    @include('layouts.script')
</body>
</html>