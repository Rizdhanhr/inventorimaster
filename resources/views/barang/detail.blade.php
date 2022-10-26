
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Detail Barang</title>
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
                <div class="page-header">
						<h4 class="page-title">Detail Barang</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Forms</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Basic Form</a>
							</li>
						</ul>
					</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="card">
									<div class="card-body">
                                    @foreach ($barang as $row)
									@method('PUT')
                                    @csrf
                                    <div class="card-body">
                                    <div class="text-center">
                                        @if ($row->gambar)
                                        <img class="profile-user-img img-fluid img-circle"
                                        src="{{asset($row->gambar)}}" width="200" height="200" 
                                        alt="User profile picture">
                                        @else
                                        <h1>Tidak Ada Gambar</h1>
                                        @endif
                                    </div>
                                    </br>
                                    <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">Stok Sekarang</label>
                                        <input type="text" class="form-control" name="sku" value="{{$row->stok}}" readonly>
									</div>
                                    </li>
                                    <li class="list-group-item">
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">Stok Minimal</label>
                                        <input type="text" class="form-control" name="sku" value="{{$row->stok_minimal}}" readonly>
									</div>
                                    </li>
                                    <li class="list-group-item">
                                    <div class="form-group">
                                    <button type="submit"  class="btn btn-primary">Penyesuaian Stok</button>
                                    </div>
                                    </li>
                                    </ul>
                                    
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                    
                                    </div>
                                    @endforeach
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="card">
									<div class="card-body">
									<!-- <h5 class="card-title mb-2 fw-mediumbold">Detail Barang</h5> -->
                                    @foreach ($barang as $row)
                                    @method('PUT')
									<div class="form-group">
                                    <label for="exampleInputEmail1">Sku</label>
                                        <input type="text" class="form-control" name="sku" value="{{$row->sku}}" readonly>
									</div>
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">Nama</label>
                                        <input type="text" class="form-control" name="nama" value="{{$row->nama}}" readonly>
									</div>
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">Kategori</label>
                                        <input type="text" class="form-control" name="kategori" value="{{$row->nama_kategori}}" readonly>
									</div>
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">Brand</label>
                                        <input type="text" class="form-control" name="brand" value="{{$row->nama_brand}}" readonly>
									</div>
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">Satuan</label>
                                        <input type="text" class="form-control" name="satuan" value="{{$row->nama_satuan}}" readonly>
									</div>
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">Spesifikasi</label>
                                    <textarea class="form-control" name="spesifikasi" id="exampleFormControlTextarea1" rows="3" readonly>{{$row->spesifikasi}}</textarea>
                                    </div>
                                    @endforeach
									</div>
								</form>
								</div>
							</div>
						</div>
				</div>
			</div>
		</div>
		
		@include('layouts.script')
		
  
</body>
</html>