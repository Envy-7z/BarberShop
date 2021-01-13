
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
<div class="container">
	<div class="card">
		<div class="card-body">
			<a href="<?=base_url('menu/tambah')?>" class="btn btn-sm btn-danger">Tambah Menu</a>
		</div>
	</div>
</div>
<div class="container" style="margin-top: 20px">
	<div class="card">
		<div class="card-body">
		    <div class="row">
		        <div class="col-md-12">
		            <h2 style="text-align: center;margin-bottom: 30px">DATA MENU</h2>
		            <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
		              <thead>
		                <tr>
		                    <th>No</th>
		                    <th>Menu</th>
		                    <td>Gambar</td>
		                    <th>Kategori</th>
		                    <th>Stok</th>
		                    <th>Harga</th>
		               		<th>Action</th>
		                </tr>
		              </thead>
		              <tbody>
		                    <?php 
		                        $no = 1;
		                        foreach($data_menu as $menu){
		                    ?>
		                        <tr>
		                            <td><?php echo $no++;?></td>
		                            <td><?php echo $menu->nama_menu;?></td>
		                            <td> <img  src='<?=base_url()?>foto/<?=$menu->gambar_menu;?>' width="100px" class="img-fluid"></td>
		                            <td><?php echo $menu->kategori;?></td>
		                            <td><?php echo $menu->stock_menu;?></td>
		                            <td><?php echo $menu->harga_menu;?></td>
		                            <td style="text-align: center;">
		                            	<a href="<?=base_url('menu/edit/'.$menu->id)?>" class="btn btn-sm btn-primary">Edit</a>
		                            	<a href="<?=base_url('menu/hapus/'.$menu->id)?>" class="btn btn-sm btn-warning">Hapus</a>
		                            </td>
		                        </tr>
		                    <?php }?>

		              </tbody>
		            </table>
		        </div>
		    </div>
		</div>
	</div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
  $(document).ready( function () {
      $('#table_id').DataTable();
  } );
</script>