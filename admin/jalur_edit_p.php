<?php
//mengambil data dari form inputan
$id_jalur = $_POST['id_jalur'];
$id_angkot = $_POST['id_angkot'];
$no_urut = $_POST['no_urut'];
$id_jalan = $_POST['id_jalan']; 
	
//mengecek apakah form kosong atau tidak
if($no_urut==""){
	echo"form tidak boleh ada yang kosong";
}else{
	$query_urut = mysql_query("select * from jalur where no_urut='$no_urut' AND id_angkot='$id_angkot' AND id_jalur<>'$id_jalur'");
	$sum_urut = mysql_num_rows($query_urut);
	if($sum_urut != "") {
		echo "no urut sudah ada";
	}else{
		//mengubah data ke database
		$update_jalur=mysql_query("UPDATE jalur SET id_angkot='$id_angkot', no_urut='$no_urut', nama_jalan='$id_jalan' WHERE id_jalur='$id_jalur'");
			
		//mengecek apakah data berhasil dimasukkan
		if($update_jalur == 1){
			echo "data berhasil di masukkan";
		//redirect ke halaman data 
			echo "<meta http-equiv=\"refresh\" content=\"0;url=?module=jalur.php&index=0\">";
		}else{
			echo"data gagal dimasukkan";
		}
	}
}
?>