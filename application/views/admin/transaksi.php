
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
<div class="container" style="margin-top: 20px">
	<div class="card">
		<div class="card-body">
		    <div class="row">
		        <div class="col-md-12">
		            <h2 style="text-align: center;margin-bottom: 30px">PESANAN MASUK</h2>
		            <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%" style="">
		              <thead>
		                <tr>
		                    <th>No</th>
		                    <td>Menu</td>
		                    <td>Nama Pemesan</td>
		                    <th>Jumlah</th>
		                    <th>Harga</th>
		                    <th>Status</th>
		                    <th>Action</th>
		                </tr>
		              </thead>
		              <tbody>
		                    <?php 
		                        $no = 1;
		                        foreach($data_transaksi as $tr){
		                    ?>
		                        <tr>
		                            <td><?php echo $no++;?></td>
		                            <td><?php echo $tr->nama_menu;?></td>
		                            <td><?php echo $tr->nama_pemesan;?></td>
		                            <td><?php echo $tr->jumlah_pesanan;?></td>
		                            <td><?php echo ($tr->jumlah_pesanan * $tr->harga_menu)?></td>
		                            <td><?php echo $tr->status;?></td>
		                            <td style="text-align: center;">
		                            	<a href="<?=base_url('transaksi/selesai/'.$tr->id)?>" class="btn btn-sm btn-success">Selesai</a>
		                            	<a href="<?=base_url('transaksi/batal/'.$tr->id)?>" class="btn btn-sm btn-danger">Batal</a>
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