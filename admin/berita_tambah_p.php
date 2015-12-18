<?php
//mengambil data dari form inputan
$nama_berita = $_POST['nama_berita'];
$judul_berita = $_POST['judul_berita'];
$isi_berita = $_POST['isi_berita']; 
$tgl_sekarang = date("Ymd"); 
	
//mengecek apakah form kosong atau tidak
if($nama_berita=="" ||$judul_berita=="" ||$isi_berita==""){
	echo"form tidak boleh ada yang kosong";
}else{
	//memaukkan data ke database
	$insert_berita = mysql_query("insert berita values ('','$tgl_sekarang','$judul_berita','$nama_berita','$isi_berita')");
		
	//mengecek apakah data berhasil dimasukkan
	if($insert_berita == 1){
		echo "data berhasil di masukkan";
	//redirect ke halaman data 
		echo "<meta http-equiv=\"refresh\" content=\"0;url=?module=berita.php&index=0\">";
	}else{
		echo"data gagal dimasukkan";
	}
}
?>
