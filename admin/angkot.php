<ul class="breadcrumb">
            <li><a href="index.php">Home</a> <span class="divider">/</span></li>
            <li class="active">Angkot</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="btn-toolbar">
    <a href="?module=angkot_tambah.php"><button class="btn btn-primary"><i class="icon-plus"></i> Tambah Angkot</button></a>
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th>No</th>
          <th>Kode Angkot</th>
          <th>Nama Angkot</th>
          <th>Ciri Angkot</th>
		  <th>Tarif Angkot</th>
          <th style="width: 75px;">Aksi</th>
        </tr>
      </thead>
      <tbody>
	  <?php
	  	$index=$_GET['index'];
		//mengambil data dari database
		$query_angkot = mysql_query("select * from angkot LIMIT $index, 10");
			
		//mengecek jumlah data yang ada
		$sum_angkot = mysql_num_rows($query_angkot);
		if($sum_angkot == "") {
			echo "tidak ada data angkot";
		}else{
			
		$nomor=0;
		//mebuat tabel bayangan untuk menampilkan data
		while ($view_angkot=mysql_fetch_array($query_angkot)){
		$id_angkot=$view_angkot['id_angkot'];
		$nama_angkot=$view_angkot['nama_angkot'];
		$ciri_angkot=$view_angkot['ciri_angkot'];
		$tarif_angkot=$view_angkot['tarif_angkot'];
		$nomor = $nomor+1;
		echo "
        <tr>
          <td>$nomor</td>
          <td>$id_angkot</td>
          <td>$nama_angkot</td>
          <td>$ciri_angkot</td>
		  <td>$tarif_angkot</td>
          <td>
              <a href='?module=angkot_edit.php&id_angkot=$id_angkot'>Edit</a> |
              <a href='?module=angkot_hapus.php&id_angkot=$id_angkot'>Hapus</a>";
		}
		}
		?>
          </td>
        </tr>
        
		
		
      </tbody>
    </table>
</div>
<div class="pagination">
    <ul>
        <li><a href="#">Select Pages</a></li>
        <?php include "angkot_page.php"; ?>
    </ul>
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
       	<?php echo "<a href='?module=angkot_hapus.php&id_angkot=$id_angkot' class='btn btn-danger'>Delete</a>"; ?>
    </div>
</div>