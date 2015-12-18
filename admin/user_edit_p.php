<?php
//mengambil data dari form inputan
$id_user = $_POST['id_user'];
$nama_lengkap = $_POST['nama_lengkap'];
$email = $_POST['email'];
$password1 = MD5($_POST['password1']);
$password2 = MD5($_POST['password2']);
$valid_mail = "^([._a-z0-9-]+[._a-z0-9-]*)@(([a-z0-9-]+\.)*([a-z0-9-]+)(\.[a-z]{2,3}))$";

if (!eregi($valid_mail, $email)){
		echo "Penulisan alamat E-mail salah!";
}else{

if ($password1=="" && $password2=="") {

	//mengubah data ke database
		$update_user=mysql_query("UPDATE login SET nama_lengkap='$nama_lengkap', email='$email' WHERE id_user='$id_user'");
		
	//mengecek apakah data berhasil dimasukkan
	if($update_user == 1){
		echo "data berhasil di masukkan";
	//redirect ke halaman data 
		echo "<meta http-equiv=\"refresh\" content=\"0;url=?module=user.php&index=0\">";
	}else{
		echo"data gagal dimasukkan";
	}
	
}else{
	if ($password1 != $password2) {
		echo "password tidak sama";
	}else{
	
		//mengubah data ke database
		$update_user=mysql_query("UPDATE login SET nama_lengkap='$nama_lengkap', email='$email', password='$password2' WHERE id_user='$id_user'");
		
		//mengecek apakah data berhasil dimasukkan
		if($update_user == 1){
			echo "data berhasil di masukkan";
		//redirect ke halaman data 
		echo "<meta http-equiv=\"refresh\" content=\"0;url=?module=user.php&index=0\">";
		}else{
			echo"data gagal dimasukkan";
		}
	}
}
}

?>