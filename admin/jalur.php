<ul class="breadcrumb">
            <li><a href="index.php">Home</a> <span class="divider">/</span></li>
            <li class="active">Jalur</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="btn-toolbar">
    <a href="?module=jalur_tambah.php"><button class="btn btn-primary"><i class="icon-plus"></i> Tambah Jalur</button></a>
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th>No</th>
          <th>Kode jalur</th>
          <th>Nama Angkot</th>
          <th>No Urut</th>
		  <th>Nama Jalan</th>
          <th style="width: 75px;">Aksi</th>
        </tr>
      </thead>
      <tbody>
	  <?php
		$index=(isset($_GET['index']))?$_GET['index']:0;
		
		//mengambil data dari database
		$query_jalur = mysql_query("select a.id_jalur, a.nama_jalan, a.id_angkot, c.nama_angkot, a.no_urut, b.id_jalan, b.nama_jalan from jalur a, jalan b, angkot c where a.nama_jalan=b.id_jalan AND a.id_angkot=c.id_angkot ORDER BY a.id_angkot, a.no_urut LIMIT $index, 10");
			
		//mengecek jumlah data yang ada
		$sum_jalur = mysql_num_rows($query_jalur);
		if($sum_jalur == "") {
			echo "tidak ada data jalur";
		}else{
			
		$nomor=0+$index;
		//mebuat tabel bayangan untuk menampilkan data
		while ($view_jalur=mysql_fetch_array($query_jalur)){
		$id_jalur=$view_jalur['id_jalur'];
		$id_angkot=$view_jalur['nama_angkot'];
		$no_urut=$view_jalur['no_urut'];
		$nama_jalan=$view_jalur['nama_jalan'];
		$nomor = $nomor+1;
		echo "
        <tr>
          <td>$nomor</td>
          <td>$id_jalur</td>
          <td>$id_angkot</td>
          <td>$no_urut</td>
		  <td>$nama_jalan</td>
          <td>
              <a href='?module=jalur_edit.php&id_jalur=$id_jalur'>Edit</a> |
              <a href='?module=jalur_hapus.php&id_jalur=$id_jalur'>Hapus</a>";
		}
		}
		?>
          </td>
        </tr>
      </tbody>
    </table>
</div>
<!--pagging-->
<div class="pagination">
    <ul>
        <li><a href="#">Select Pages</a></li>
        <?php include "jalur_page.php"; ?>
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
        <?php echo "<a href='?module=jalur_hapus.php&id_jalur=$id_jalur' class='btn btn-danger'>Delete</a>"; ?>
    </div>
</div>