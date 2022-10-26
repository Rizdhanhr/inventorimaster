<div class="sidebar sidebar-style-2">
			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="{{asset('template')}}/assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									Rizdhan
									<span class="user-level">Administrator</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li>
										<a href="#profile">
											<span class="link-collapse">My Profile</span>
										</a>
									</li>
									<li>
										<a href="#edit">
											<span class="link-collapse">Edit Profile</span>
										</a>
									</li>
									<li>
										<a href="#settings">
											<span class="link-collapse">Settings</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav nav-primary">
                        <li class="nav-item">
                        <a href="{{url('dashboard')}}" class="nav-link active">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                        </a>
						</li>
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Components</h4>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#base">
								<i class="fas fa-book"></i>
								<p>Master</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="base">
								<ul class="nav nav-collapse">
                                    <li>
										<a href="{{url('barang')}}">
											<span class="sub-item">Barang</span>
										</a>
									</li>
                                    <li>
										<a href="{{url('kategori')}}">
											<span class="sub-item">Kategori</span>
										</a>
									</li>
									<li>
										<a href="{{url('brand')}}">
											<span class="sub-item">Brand</span>
										</a>
									</li>
                                    <li>
										<a href="{{url('satuan')}}">
											<span class="sub-item">Satuan</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#aktivitas">
								<i class="fas fa-layer-group"></i>
								<p>Aktivitas</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="aktivitas">
								<ul class="nav nav-collapse">
                                    <li>
										<a href="{{url('barangmasuk')}}">
											<span class="sub-item">Barang Masuk</span>
										</a>
									</li>
                                    <li>
										<a href="{{url('barangkeluar')}}">
											<span class="sub-item">Barang Keluar</span>
										</a>
									</li>
									<li>
										<a href="{{url('suratjalan')}}">
											<span class="sub-item">Surat Jalan</span>
										</a>
									</li>
                                    <li>
										<a href="#">
											<span class="sub-item">Penyesuaian</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#stok">
								<i class="fas fa-inbox"></i>
								<p>Stok</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="stok">
								<ul class="nav nav-collapse">
                                    <li>
										<a href="{{url('datastok')}}">
											<span class="sub-item">Data Stok</span>
										</a>
									</li>
                                    <li>
										<a href="{{url('stokmenipis')}}">
											<span class="sub-item">Batas Stok</span>
										</a>
									</li>
									<li>
										<a href="{{url('datamutasi')}}">
											<span class="sub-item">Mutasi</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#laporan">
								<i class="fas fa-file"></i>
								<p>Laporan</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="laporan">
								<ul class="nav nav-collapse">
                                    <li>
										<a href="#">
											<span class="sub-item">Stok</span>
										</a>
									</li>
                                    <li>
										<a href="#">
											<span class="sub-item">List Penyesuaian</span>
										</a>
									</li>
									<li>
										<a href="#">
											<span class="sub-item">Masuk Keluar</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#sl">
								<i class="fas fa-address-book"></i>
								<p>Supplier & Pelanggan</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="sl">
								<ul class="nav nav-collapse">
                                    <li>
										<a href="{{url('pelanggan')}}">
											<span class="sub-item">Pelanggan</span>
										</a>
									</li>
                                    <li>
										<a href="{{url('supplier')}}">
											<span class="sub-item">Supplier</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
                        <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Manajemen User
                        </p>
                        </a>
						</li>
				</div>
			</div>
		</div>