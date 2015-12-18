  <?php
	  	$id_berita=$_GET['id_berita'];
		
		//mengambil data dari database
		$query_berita = mysql_query("select * from berita where id_berita='$id_berita'");
			
		//mengecek jumlah data yang ada
		$sum_berita = mysql_num_rows($query_berita);
		if($sum_berita == "") {
			echo "tidak ada data berita";
		}else{
			
		$nomor=0;
		//mebuat tabel bayangan untuk menampilkan data
		$view_berita=mysql_fetch_array($query_berita);
		$id_berita=$view_berita['id_berita'];
		$nama_berita=$view_berita['nama_berita'];
		$tgl_berita=$view_berita['tgl_berita'];
		$date=tgl_indo($tgl_berita);
		$judul_berita=$view_berita['judul_berita'];
		$isi_berita=$view_berita['isi_berita'];
		$nomor = $nomor+1;
		echo "
        <div class='article'>
          <h2>$judul_berita</h2>
          <div class='clr'></div>
          <p><span class='date'>$date</span> &nbsp;|&nbsp; nama berita <i>$nama_berita</i></p>
          <p align='justify'>$isi_berita</p>
		</div>";
		}
		?>
<div style="text-align:center">
        <a href="?module=berita.php&index=0">[ kembali ]</a>
</div>
