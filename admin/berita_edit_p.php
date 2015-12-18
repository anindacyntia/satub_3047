<?php
//mengambil data dari form inputan
$id_berita = $_POST['id_berita'];
$nama_berita = $_POST['nama_berita'];
$judul_berita = $_POST['judul_berita'];
$isi_berita = $_POST['isi_berita']; 
$tgl_sekarang = date("Ymd"); 
	
//mengecek apakah form kosong atau tidak
if($nama_berita=="" ||$judul_berita=="" ||$isi_berita==""){
	echo"form tidak boleh ada yang kosong";
}else{
	//mengubah data ke database
		$update_berita=mysql_query("UPDATE berita SET judul_berita='$judul_berita', nama_berita='$nama_berita', isi_berita='$isi_berita'  WHERE id_berita='$id_berita'");
		
	//mengecek apakah data berhasil dimasukkan
	if($update_berita == 1){
		echo "data berhasil di masukkan";
	//redirect ke halaman data 
		echo "<meta http-equiv=\"refresh\" content=\"0;url=?module=berita.php&index=0\">";
	}else{
		echo"data gagal dimasukkan";
	}
}
?>