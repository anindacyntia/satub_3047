<?php
$dari = $_POST['dari'];
$menuju = $_POST['menuju'];
$jenis = $_POST['jenis'];
?>

<ul class="breadcrumb">
            <li><a href="index.php">Home</a> <span class="divider">/</span></li>
            <li class="active">Hasil Cari</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="well">
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
    <form action="?module=jalur_tambah_p.php" method="post">
	<h4>Hasil Pencarian Jalur</h4>
	<?php
		
		//mengambil data dari database
		$query_jalur = mysql_query("select * from jalur where nama_jalan='$dari' && nama_jalan='$menuju'");
		
		//mengecek jumlah data yang ada
		$sum_jalur = mysql_num_rows($query_jalur);
		if($sum_jalur == "") {
			echo "tidak ada data jalur";
		}else{
			while ($view_jalur=mysql_fetch_array($query_jalur)){
			$id_jalur=$view_jalur['id_jalur'];
			$id_angkot=$view_jalur['id_angkot'];
			$no_urut=$view_jalur['no_urut'];
			$nama_jalan=$view_jalur['nama_jalan'];
			$nomor = $nomor+1;
			
			echo " $id_jalur, $id_angkot, $no_urut, $nama_jalan ||";
			}
		}	
	?>
	<p class="muted">Solusi 1 </p>
	<p class="muted">Solusi 2 </p>
	<p class="muted">Solusi 3 </p>
	<p class="muted">Solusi 4 </p>
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