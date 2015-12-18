 <ul class="breadcrumb">
            <li><a href="index.php">Home</a> <span class="divider">/</span></li>
            <li class="active">Edit jalur</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="well">
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
    <form action="?module=jalur_edit_p.php" method="post">
	<?php
		$id_jalur = $_GET['id_jalur'];
		
		//mengambil data dari database
		$query_jalur = mysql_query("select * from jalur where id_jalur = '$id_jalur'");
				
		//mebuat tabel bayangan untuk menampilkan data
		$view_jalur=mysql_fetch_array($query_jalur);
	?>
        <label>Kode jalur</label>
        <input type="text" value="Otomatis" class="input-xlarge" disabled="disabled">
        <label>Kode Angkot</label>
        <select name="id_angkot" id="DropDownTimezone" class="input-xlarge">
		<?php
		 echo "<option value='$view_jalur[id_angkot]'>$view_jalur[id_angkot]</option>";
			//mengambil data dari database
		$query_angkot = mysql_query("select * from angkot");
		//mebuat tabel bayangan untuk menampilkan data
		while ($view_angkot=mysql_fetch_array($query_angkot)){
		$id_angkot=$view_angkot['id_angkot'];
          echo "<option value= '$id_angkot'>$id_angkot</option>";
		 }
		 ?> 
		 
    	</select>
        <label>No Urut</label>
        <input type="text" value="<?php echo $view_jalur['no_urut'] ?>" name="no_urut" class="input-xlarge">
        <label>Nama Jalan</label>
        <select name="id_jalan" id="DropDownTimezone" class="input-xlarge">
		
		<?php
		//echo "<option value='$view_jalur[nama_jalan]'>$view_jalur[nama_jalan]</option>";
		//mengambil data dari database
		$query_jalan = mysql_query("select * from jalan");
		//mebuat tabel bayangan untuk menampilkan data
		while ($view_jalan=mysql_fetch_array($query_jalan)){
		$id_jalan=$view_jalan['id_jalan'];
		$nama_jalan=$view_jalan['nama_jalan'];
		?>
		<option value='<?php echo $id_jalan;?>' <?php echo ($id_jalan==$view_jalur['nama_jalan'])?'selected':'';?>><?php echo $nama_jalan;?></option>
		<?php
		}
		?>
    	</select>
	<div>
	<input type="hidden" name="id_jalur" value="<?php echo $view_jalur[id_jalur] ?>" />
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