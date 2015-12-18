 <ul class="breadcrumb">
            <li><a href="index.php">Home</a> <span class="divider">/</span></li>
            <li class="active">Edit Jalan</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="well">
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
    <form action="?module=jalan_edit_p.php" method="post">
	
	<?php
		$id_jalan = $_GET['id_jalan'];
		
		//mengambil data dari database
		$query_jalan = mysql_query("select * from jalan where id_jalan='$id_jalan'");
			
		//mebuat tabel bayangan untuk menampilkan data
		$view_jalan=mysql_fetch_array($query_jalan);
	?>
        <label>Kode Jalan</label>
        <input type="text" value="<?php echo "$view_jalan[id_jalan]" ?>" class="input-xlarge" disabled="disabled">
        <label>Nama Jalan</label>
        <input type="text" value="<?php echo "$view_jalan[nama_jalan]" ?>" name="nama_jalan" class="input-xlarge">
        <label>Jarak</label>
        <input type="text" value="<?php echo "$view_jalan[jarak]" ?>" name="jarak" class="input-xlarge">
	<div>
	<input type="hidden" value="<?php echo "$view_jalan[id_jalan]" ?>" name="id_jalan" />
	<button type="submit" class="btn btn-primary"><i class="icon-save"></i> Simpan</button>
    <button type="reset" class="btn">Batal</button>
	</div>
    </form>
		
      </div>
  </div>

</div>

<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Delete Confirmation</h3>
  </div>
  <div class="modal-body">
    
    <p class="error-text"><i class="icon-warning-sign modal-icon"></i>Are you sure you want to delete the user?</p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
    <button class="btn btn-danger" data-dismiss="modal">Delete</button>
  </div>
</div>
