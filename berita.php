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
		$isi_berita=$view_berita['isi_berita'];
		$isi_berita= substr($isi_berita,0,300);
		$nomor = $nomor+1;
		echo "
        <div class='article'>
          <h2>$judul_berita</h2>
          <div class='clr'></div>
          <p><span class='date'>$date</span> &nbsp;|&nbsp; nama berita <i>$nama_berita</i></p>
          <p align='justify'>$isi_berita</p>
          <p class='spec'><a href='index.php?module=berita_detail.php&id_berita=$id_berita' class='rm'>Read more</a></p>
</div>";
		}
		}
		?>

<div class="pagination">
        Select Pages |
        <?php include "berita_page.php"; ?>

</div>
