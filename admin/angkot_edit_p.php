<?php
//mengambil data dari form inputan
$id_angkot = $_POST['id_angkot'];
$nama_angkot = $_POST['nama_angkot'];
$tarif_angkot = $_POST['tarif_angkot'];
$ciri_angkot = $_POST['ciri_angkot']; 
	
//mengecek apakah form kosong atau tidak
if($nama_angkot=="" ||$tarif_angkot=="" ||$ciri_angkot==""){
	echo"form tidak boleh ada yang kosong";
}else{
	//mengubah data ke database
		$update_angkot=mysql_query("UPDATE angkot SET nama_angkot='$nama_angkot', tarif_angkot='$tarif_angkot', ciri_angkot='$ciri_angkot'  WHERE id_angkot='$id_angkot'");
		
	//mengecek apakah data berhasil dimasukkan
	if($update_angkot == 1){
		echo "data berhasil di masukkan";
	//redirect ke halaman data 
		echo "<meta http-equiv=\"refresh\" content=\"0;url=?module=angkot.php&index=0\">";
	}else{
		echo"data gagal dimasukkan";
	}
}
?>