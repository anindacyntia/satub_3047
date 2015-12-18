<ul class="breadcrumb">
            <li><a href="index.php">Home</a> <span class="divider">/</span></li>
            <li class="active">Jalan</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="btn-toolbar">
    <a href="?module=jalan_tambah.php"><button class="btn btn-primary"><i class="icon-plus"></i> Tambah Jalan</button></a>
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th>No</th>
          <th>Kode </th>
          <th>Nama Jalan</th>
          <th>Jarak</th>
          <th style="width: 75px;">Aksi</th>
        </tr>
      </thead>
      <tbody>
	  <?php
	  	$index=$_GET['index'];
		
		//mengambil data dari database
		$query_jalan = mysql_query("select * from jalan LIMIT $index, 10");
			
		//mengecek jumlah data yang ada
		$sum_jalan = mysql_num_rows($query_jalan);
		if($sum_jalan == "") {
			echo "tidak ada data jalan";
		}else{
			
		$nomor=0;
		//mebuat tabel bayangan untuk menampilkan data
		while ($view_jalan=mysql_fetch_array($query_jalan)){
		$id_jalan=$view_jalan['id_jalan'];
		$nama_jalan=$view_jalan['nama_jalan'];
		$jarak=$view_jalan['jarak'];
		$tarif_jalan=@$view_jalan['tarif_jalan'];
		$nomor = $nomor+1;
		echo "
        <tr>
          <td>$nomor</td>
          <td>$id_jalan</td>
          <td>$nama_jalan</td>
		  <td>$jarak</td>
          <td>
              <a href='?module=jalan_edit.php&id_jalan=$id_jalan'>Edit</a> |
              <a href='?module=jalan_hapus.php&id_jalan=$id_jalan'>Hapus</a>";
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
        <?php include "jalan_page.php"; ?>
    </ul>
</div>

<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Delete Confirmation</h3>
    </div>
    <div class="modal-body">
        <p class="error-text"><i class="icon-warning-sign modal-icon"></i>Are you sure you want to delete ?</p>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
        <?php echo "<a href='?module=jalan_hapus.php&id_jalan=$id_jalan' class='btn btn-danger'>Delete</a>"; ?>
    </div>
</div>
