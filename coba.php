<?php
include "lib/koneksi.php";
include "lib/kalender.php";
include "lib/fungsi_indotgl.php";
?>
<h2><span>Cari Jalur</span></h2>
<div class="clr"></div>
<form action="coba_aksi.php" method="post">
<h4>Pilih Nama Jalan</h4>
<table width="200" border="0">
  <tr>
    <td>Dari</td>
  </tr>
  <tr>
    <td>
	<select name="dari" style="width:200px;">
		<?php
		//mengambil data dari database
		$query_jalur = mysql_query("select a.id_jalur, a.nama_jalan, b.id_jalan, b.nama_jalan from jalur a, jalan b where a.nama_jalan=b.id_jalan GROUP BY a.nama_jalan ORDER BY b.nama_jalan");
			
		//mengecek jumlah data yang ada
		$sum_jalur = mysql_num_rows($query_jalur);
		if($sum_jalur == "") {
			echo "tidak ada data jalan";
		}else{
			
		$nomor=0;
		//mebuat tabel bayangan untuk menampilkan data
		while ($view_jalur=mysql_fetch_array($query_jalur)){
		$nama_jalan=$view_jalur['nama_jalan'];
		$id_jalan=$view_jalur['id_jalan'];
		echo "<option value='$id_jalan'>$nama_jalan</option>";
		}
		}
		?>	 
    	</select>
	</td>
  </tr>
  <tr>
    <td>Menuju</td>
  </tr>
  <tr>
    <td>
	<select name="menuju" style="width:200px;">
		<?php
		//mengambil data dari database
		$query_jalur = mysql_query("select a.id_jalur, a.nama_jalan, b.id_jalan, b.nama_jalan from jalur a, jalan b where a.nama_jalan=b.id_jalan GROUP BY a.nama_jalan ORDER BY b.nama_jalan");
			
		//mengecek jumlah data yang ada
		$sum_jalur = mysql_num_rows($query_jalur);
		if($sum_jalur == "") {
			echo "tidak ada data jalan";
		}else{
			
		$nomor=0;
		//mebuat tabel bayangan untuk menampilkan data
		while ($view_jalur=mysql_fetch_array($query_jalur)){
		$nama_jalan=$view_jalur['nama_jalan'];
		$id_jalan=$view_jalur['id_jalan'];
		echo "<option value='$id_jalan'>$nama_jalan</option>";
		}
		}
		?> 
    	</select>
	</td>
  </tr>
  <tr>
  	<td>
  	Pencarian Berdasarkan :<br>
	<input name="jenis" type="radio" value="termurah" checked="checked"> Biaya Termurah<br>
	<input name="jenis" type="radio" value="terdekat"> Jalur Terpendek<br>
	<input name="jenis" type="radio" value="lain"> Jalur Lain<br>
  	</td>
  </tr>
  <tr>
  	<td>
  <button type="submit" class="btn btn-primary"><i class="icon-search"></i> Cari</button>
  	</td>
  </tr>
</table>
<p>&nbsp;</p>
</form>
