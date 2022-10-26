
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
										<h4 class="card-title">Tambah Kategori</h4>
									</div>
								</div>
								<div class="card-body">
									
                                    <form action="{{route('kategori.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Kategori</label>
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror" value="{{old('nama')}}" name="nama" placeholder="Masukkan Nama Kategori">
									<span style="color : red">@error('nama') {{$message}} @enderror</span>
                                    </div>
                                        <input type="hidden" value="jarwo" class="form-control" name="created_by">
                                        <input type="hidden" value="jarwo" class="form-control" name="updated_by">
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                    <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                    </div>
                                    </form>
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