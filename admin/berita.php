<ul class="breadcrumb">
            <li><a href="index.php">Home</a> <span class="divider">/</span></li>
            <li class="active">Berita</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="btn-toolbar">
    <a href="?module=berita_tambah.php"><button class="btn btn-primary"><i class="icon-plus"></i> Tambah Berita</button></a>
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th>No</th>
          <th>ID berita</th>
          <th>Tgl berita</th>
          <th>Judul berita</th>
		  <th>Nama berita</th>
          <th style="width: 75px;">Aksi</th>
        </tr>
      </thead>
      <tbody>
	  <?php
	  	$index=$_GET['index'];
		
		//mengambil data dari database
		$query_berita = mysql_query("select * from berita LIMIT $index, 10");
			
		//mengecek jumlah data yang ada
		$sum_berita = mysql_num_rows($query_berita);
		if($sum_berita == "") {
			echo "tidak ada data berita";
		}else{
			
		$nomor=0;
		//mebuat tabel bayangan untuk menampilkan data
		while ($view_berita=mysql_fetch_array($query_berita)){
		$id_berita=$view_berita['id_berita'];
		$nama_berita=$view_berita['nama_berita'];
		$tgl_berita=$view_berita['tgl_berita'];
		$date=tgl_indo($tgl_berita);
		$judul_berita=$view_berita['judul_berita'];
		$nomor = $nomor+1;
		echo "
        <tr>
          <td>$nomor</td>
          <td>$id_berita</td>
          <td>$date</td>
          <td>$judul_berita</td>
		  <td>$nama_berita</td>
          <td>
              <a href='?module=berita_edit.php&id_berita=$id_berita'>Edit</a> |
              <a href='?module=berita_hapus.php&id_berita=$id_berita'>Hapus</a>";
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
        <?php include "berita_page.php"; ?>
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
        <?php echo "<a href='?module=berita_hapus.php&id_berita=$id_berita' class='btn btn-danger'>Delete</a>"; ?>
    </div>
</div>