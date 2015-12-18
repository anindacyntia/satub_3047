<?php
//mengambil data dari form inputan
$id_angkot = $_POST['id_angkot'];
$no_urut = $_POST['no_urut'];
$id_jalan = $_POST['id_jalan']; 
	
//mengecek apakah form kosong atau tidak
if($no_urut==""){
	echo"form tidak boleh ada yang kosong";
}else{
	$query_urut = mysql_query("select * from jalur where no_urut='$no_urut' AND id_angkot='$id_angkot'");
	$sum_urut = mysql_num_rows($query_urut);
	if($sum_urut != "") {
		echo "no urut sudah ada";
	}else{
	
		//memaukkan data ke database
		$insert_jalur = mysql_query("insert jalur values ('','$id_angkot','$no_urut','$id_jalan')");
		
		//mengecek apakah data berhasil dimasukkan
		if($insert_jalur == 1){
			echo "data berhasil di masukkan";
		//redirect ke halaman data 
			echo "<meta http-equiv=\"refresh\" content=\"0;url=?module=jalur.php&index=0\">";
		}else{
			echo"data gagal dimasukkan";
		}
	}
}
?>