<iframe width="450" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=cirebon&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=41.275297,56.513672&amp;ie=UTF8&amp;hq=&amp;hnear=Cirebon,+West+Java,+Indonesia&amp;t=m&amp;z=12&amp;ll=-6.715534,108.564003&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=cirebon&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=41.275297,56.513672&amp;ie=UTF8&amp;hq=&amp;hnear=Cirebon,+West+Java,+Indonesia&amp;t=m&amp;z=12&amp;ll=-6.715534,108.564003" style="color:#0000FF;text-align:left">View Larger Map</a></small>

<h2><span>Cari Jalur</span></h2>
<div class="clr"></div>
<form action="?module=cari_jalur_h.php" method="post">
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
