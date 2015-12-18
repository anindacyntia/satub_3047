<?php
//mengambil data dari form inputan
$nama_jalan = $_POST['nama_jalan'];
$jarak = $_POST['jarak'];
	
//mengecek apakah form kosong atau tidak
if($nama_jalan=="" ||$jarak==""){
	echo"form tidak boleh ada yang kosong";
}else{
	//memaukkan data ke database
	$insert_jalan = mysql_query("insert jalan values ('','$nama_jalan','$jarak')");
		
	//mengecek apakah data berhasil dimasukkan
	if($insert_jalan == 1){
		echo "data berhasil di masukkan";
	//redirect ke halaman data 
		echo "<meta http-equiv=\"refresh\" content=\"0;url=?module=jalan.php&index=0\">";
	}else{
		echo"data gagal dimasukkan";
	}
}
?>