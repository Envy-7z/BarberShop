
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
<div class="container" style="margin-top: 20px">
	<div class="card">
		<div class="card-body">
		    <div class="row">
		        <div class="col-md-12">
		        	    <form action="<?=base_url()?>menu/proses_edit" method="POST" enctype="multipart/form-data">
		        	    	<?php foreach($menu as $m){ ?>
		        	        <div class="row">
		        	            <div class="col-6">
		        	                <div class="form-group">
		        	                    <label for="nama_menu" class="col-form-label">Nama Menu</label>
		        	                    <input id="nama_menu" type="text" class="form-control form-control-line form-user-input" value="<?= $m->nama_menu?>" name="nama_menu">
		        	                </div>
		        	                <div class="form-group">
		        	                	<img class="img-thumbnail" src="<?=base_url()?>foto/<?=$m->gambar_menu;?>">
		        	                </div>
		        	                <div class="form-group">
		        	                    <label class="col-md-12">Upload Foto</label>
		        	                        <div class="col-md-12">
		        	                        <input type="file" name="gambar_menu" id="gambar_menu">
		        	                    	</div>
		        	                </div>
		        	                <div class="form-group">
		        	                    <label for="stock_menu" class="col-form-label">Stock</label>
		        	                    <select class="form-control form-control-line form-user-input" id="stock_menu"  value="<?= $m->stock_menu?>" name="stock_menu" >
		        	                    <option value="Tersedia" <?php if($m->stock_menu == "Tersedia") echo 'selected=""'?>>Tersedia</option>
		        	                    <option value="Tidak" <?php if($m->stock_menu == "Tidak") echo 'selected=""'?>>Tidak</option>
		        	                  </select>
		        	                </div>
		        	                <div class="form-group">
		        	                    <label for="kategori" class="col-form-label">Kategori</label>
		        	                    <select class="form-control form-control-line form-user-input" id="kategori"  value="<?= $m->kategori?>" name="kategori" >
		        	                    <option value="Makanan" <?php if($m->kategori == "Makanan") echo 'selected=""'?>>Makanan</option>
		        	                    <option value="Minuman" <?php if($m->kategori == "Minuman") echo 'selected=""'?>>Minuman</option>
		        	                  </select>
		        	                </div>
		        	                <div class="form-group">
		        	                    <label for="harga_menu" class="col-form-label">Harga</label>
		        	                    <input id="harga_menu" type="text" class="form-control form-control-line form-user-input" value="<?= $m->harga_menu?>" name="harga_menu">
		        	                </div>
	        	                </div>
	        	            </div>
	        	        	<?php } ?>
		        	        </div>
		        	        <div class="form-group">
		        	            <div class="col-sm-12">
		        	                <input class="form-user-input" type="hidden" name="id" id="id" value="<?= $m->id?>">
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