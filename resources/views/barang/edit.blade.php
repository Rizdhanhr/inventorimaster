
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Barang</title>
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
										<h4 class="card-title">Edit Barang</h4>
									</div>
								</div>
								<div class="card-body">
                                    @foreach ($barang as $row)
                                    <form action="{{route('barang.update',$row->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="card-body">
                                    <input type="hidden" name="id" value="{{ $row->id }}">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Sku</label>
                                        <input type="text" class="form-control" name="sku" value="{{$row->sku}}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Barang</label>
                                        <input type="text" class="form-control" name="nama" value="{{$row->nama}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Kategori</label>
                                        <select name="kategori" class="form-control" aria-label="Default select example">
                                            <option selected>Pilih Kategori</option>
                                            @foreach ($kategori as $rowkategori)
                                            <option {{$row->id_kategori==$rowkategori->id ? 'selected' : ''}} value="{{$rowkategori->id}}">{{$rowkategori->nama}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Brand</label>
                                        <select name="brand" class="form-control" aria-label="Default select example">
                                            <option selected>Pilih Brand</option>
                                            @foreach ($brand as $rowbrand)
                                            <option {{$row->id_brand==$rowbrand->id ? 'selected' : ''}} value="{{$rowbrand->id}}">{{$rowbrand->nama}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Satuan</label>
                                        <select name="satuan" class="form-control" aria-label="Default select example">
                                            <option selected>Pilih Satuan</option>
                                            @foreach ($satuan as $rowsatuan)
                                            <option {{$row->id_satuan==$rowsatuan->id ? 'selected' : ''}} value="{{$rowsatuan->id}}">{{$rowsatuan->nama}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">Spesifikasi</label>
                                    <textarea class="form-control" name="spesifikasi" rows="3">{{$row->spesifikasi}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Stok Minimal</label>
                                        <input type="text" class="form-control" name="stok_minimal" value="{{$row->stok_minimal}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Updated By</label>
                                        <input type="text" class="form-control" name="updated_by" value="{{$row->updated_by}}">
                                    </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                    <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
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