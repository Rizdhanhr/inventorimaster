
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Brand</title>
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
										<h4 class="card-title">Tambah Barang</h4>
									</div>
								</div>
								<div class="card-body">
                                    <form action="{{URL::to('/')}}/barang" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                    <!-- <div class="form-group">
                                        <label for="exampleInputEmail1">Sku</label>
                                        <input type="text" class="form-control" name="sku" placeholder="SKU">
                                    </div> -->
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Barang</label>
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror" value="{{old('nama')}}" name="nama" placeholder="Masukkan Nama Barang">
                                        <span style="color : red">@error('nama') {{$message}} @enderror</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Kategori</label>
                                        <select name="kategori" class="form-control" aria-label="Default select example" >
                                            <option selected>Pilih Kategori</option>
                                            @foreach ($kategori as $row)
                                            <option value="{{$row->id}}" >{{$row->nama}}</option>
                                            @endforeach
                                        </select>
                                        <!-- <span style="color : red">@error('id_kategori') {{$message}} @enderror</span> -->
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Brand</label>
                                        <select name="brand" class="form-control" aria-label="Default select example">
                                            <option selected>Pilih Brand</option>
                                            @foreach ($brand as $row)
                                            <option value="{{$row->id}}">{{$row->nama}}</option>
                                            @endforeach
                                        </select>
                                        <!-- <span style="color : red">@error('id_brand') {{$message}} @enderror</span> -->
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Satuan</label>
                                        <select name="satuan" class="form-control" aria-label="Default select example">
                                            <option selected>Pilih Satuan</option>
                                            @foreach ($satuan as $row)
                                            <option value="{{$row->id}}">{{$row->nama}}</option>
                                            @endforeach
                                        </select>
                                        <!-- <span style="color : red">@error('id_satuan') {{$message}} @enderror</span> -->
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Stok</label>
                                        <input type="number" class="form-control" value="{{old('stok')}}" name="stok" placeholder="Masukkan Stok Sekarang">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Stok Minimal</label>
                                        <input type="number" class="form-control" name="stok_minimal" placeholder="Masukkan Stok Minimal">
                                    </div>
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">Spesifikasi</label>
                                    <textarea class="form-control" name="spesifikasi" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    <span style="color : red">@error('spesifikasi') {{$message}} @enderror</span>
                                    </div>
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">Gambar</label>
                                    <input class="form-control" name="gambar" type="file" id="formFile">
                                    <span style="color : red">@error('gambar') {{$message}} @enderror</span>
                                    </div>
                                        <input value="jarwo" type="hidden" class="form-control" name="created_by" required>
                                        <input type="hidden" value="jarwo" class="form-control" name="updated_by" required>
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