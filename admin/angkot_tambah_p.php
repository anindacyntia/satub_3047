<?php
//mengambil data dari form inputan
$nama_angkot = $_POST['nama_angkot'];
$tarif_angkot = $_POST['tarif_angkot'];
$ciri_angkot = $_POST['ciri_angkot']; 
	
//mengecek apakah form kosong atau tidak
if($nama_angkot=="" ||$tarif_angkot=="" ||$ciri_angkot==""){
	echo"form tidak boleh ada yang kosong";
}else{
	//memaukkan data ke database
	$insert_angkot = mysql_query("insert angkot values ('','$nama_angkot','$tarif_angkot','$ciri_angkot')");
		
	//mengecek apakah data berhasil dimasukkan
	if($insert_angkot == 1){
		echo "data berhasil di masukkan";
	//redirect ke halaman data 
		echo "<meta http-equiv=\"refresh\" content=\"0;url=?module=angkot.php&index=0\">";
	}else{
		echo"data gagal dimasukkan";
	}
}
?>