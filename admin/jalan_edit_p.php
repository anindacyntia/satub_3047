<?php
//mengambil data dari form inputan
$id_jalan = $_POST['id_jalan'];
$nama_jalan = $_POST['nama_jalan'];
$jarak = $_POST['jarak'];

//mengecek apakah form kosong atau tidak
if($nama_jalan=="" ||$jarak==""){
	echo"form tidak boleh ada yang kosong";
}else{
	//mengubah data ke database
		$update_jalan=mysql_query("UPDATE jalan SET nama_jalan='$nama_jalan', jarak='$jarak' WHERE id_jalan='$id_jalan'");
		
	//mengecek apakah data berhasil dimasukkan
	if($update_jalan == 1){
		echo "data berhasil di masukkan";
	//redirect ke halaman data 
		echo "<meta http-equiv=\"refresh\" content=\"0;url=?module=jalan.php&index=0\">";
	}else{
		echo"data gagal dimasukkan";
	}
}
?>