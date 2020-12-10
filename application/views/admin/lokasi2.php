
	<div class="container-fluid">
		<button class="btn btn-sm btn-primary mt-3 mb-3" data-toggle="modal" data-target="#tambahModal">
			<i class="fa fa-plus fa-sm"></i>
			Tambah Data Barang
		</button>

		<table class="table table-bordered">
			<tr>
				<th>NO</th>
				<th>NAMA BARANG</th>
				<th>KETERANGAN</th>
				<th>KATEGORI</th>
				<th>HARGA</th>
				<th>STOK</th>
				<th colspan="3" class="text-center">AKSI</th>
			</tr>

		    <tr>
					<td>1</td>
					<td>IPAD 3</td>
					<td>Ini adalah Ipad terbagus</td>
					<td>Tablet</td>
					<td>20.000.000</td>
					<td>7</td>
					<td>
						<div class="btn btn-success btn-sm">
							<i class="fas fa-search-plus"></i>
						</div>
					</td>
					<td>
						<a href="http://localhost/toko/admin/data_barang/edit/2"><div class="btn btn-primary btn-sm">
						<i class="fa fa-edit"></i></div></a>					</td>
					<td onclick="return confirm('Yakin Hapus?')">
						<a href="http://localhost/toko/admin/data_barang/hapus/2"><div class="btn btn-danger btn-sm"> 
						<i class="fa fa-trash"></i></div></a>					</td>
			</tr>
							
					</table>
	</div>
</div>

<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Form Tambah Barang</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="http://localhost/toko/admin/data_barang/tambahaksi" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="">Nama Barang</label>
						<input type="text" name="nama_brg" class="form-control">
					</div>
					<div class="form-group">
						<label for="">Keterangan</label>
						<input type="text" name="keterangan" class="form-control">
					</div>
					<div class="form-group">
						<label for="">Kategori</label>
						<select class="form-control" id="kategori" name="kategori">
							<option value="Handphone">Handphone</option>
							<option value="Laptop">Laptop</option>
							<option value="Tablet">Tablet</option>
						</select>
					</div>
					<div class="form-group">
						<label for="">Harga</label>
						<input type="number" name="harga" class="form-control">
					</div>
					<div class="form-group">
						<label for="">Stok</label>
						<input type="number" name="stok" class="form-control">
					</div>
					<div class="form-group">
						<label for="">Gambar Produk</label> <br>
						<input type="file" name="gambar" class="form-control">
					</div>
					<div class="modal-footer">
						<button type="reset" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>  