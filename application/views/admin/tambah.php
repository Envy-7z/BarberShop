
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
<div class="container" style="margin-top: 20px">
	<div class="card">
		<div class="card-body">
		    <div class="row">
		        <div class="col-md-12">
		        	    <form action="proses_tambah" method="POST" enctype="multipart/form-data">
		        	        <div class="row">
		        	            <div class="col-6">
		        	                <div class="form-group">
		        	                    <label for="nama_menu" class="col-form-label">Nama Menu</label>
		        	                    <input id="nama_menu" type="text" class="form-control form-control-line form-user-input" name="nama_menu">
		        	                </div>
		        	                <div class="form-group">
		        	                    <label class="col-md-12">Upload Foto</label>
		        	                        <div class="col-md-12">
		        	                        <input type="file" name="gambar_menu" id="gambar_menu">
		        	                    	</div>
		        	                </div>
<!-- 		        	                <div class="form-group">
		        	                    <label for="stock_menu" class="col-form-label">Stock</label>
		        	                    <input id="stock_menu" type="text" class="form-control form-control-line form-user-input" name="stock_menu">
		        	                </div> -->
		        	                <div class="form-group">
		        	                    <label for="stock_menu" class="col-form-label">Stock</label>
		        	                    <select class="form-control form-control-line form-user-input" id="stock_menu"name="stock_menu" >
		        	                    <option>Tersedia</option>
		        	                    <option>Tidak Tersedia</option>
		        	                  </select>
		        	                </div>
		        	                <div class="form-group">
		        	                    <label for="kategori" class="col-form-label">Kategori</label>
		        	                    <select class="form-control form-control-line form-user-input" id="kategori"name="kategori" >
		        	                    <option>Services</option>
		        	                    <option>Styles</option>
		        	                  </select>
		        	                </div>
		        	                <div class="form-group">
		        	                    <label for="harga_menu" class="col-form-label">Harga</label>
		        	                    <input id="harga_menu" type="text" class="form-control form-control-line form-user-input" name="harga_menu">
		        	                </div>
		        	                </div>
		        	            </div>
		        	        </div>
		        	        <div class="form-group">
		        	            <div class="col-sm-12">
		        	                <input class="form-user-input" type="hidden" name="id" id="id" value="">
		        	                <button class="btn btn-primary" type="submit">Simpan Data</button>
		        	            </div>
		        	        </div> 
		        	    </form>
		        	</div>
		        </div>
		    </div>
		</div>
	</div>
</div>