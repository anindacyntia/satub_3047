<?php
//mengambil data dari form inputan
$nama_lengkap = $_POST['nama_lengkap'];
$email = $_POST['email'];
$password1 = MD5($_POST['password1']);
$password2 = MD5($_POST['password2']);
$valid_mail = "^([._a-z0-9-]+[._a-z0-9-]*)@(([a-z0-9-]+\.)*([a-z0-9-]+)(\.[a-z]{2,3}))$";
	
//mengecek apakah form kosong atau tidak
if($nama_lengkap=="" ||$email=="" ||$password1=="" ||$password2==""){
	echo"form tidak boleh ada yang kosong";
}else{

	if (!eregi($valid_mail, $email)){
		echo "Penulisan alamat E-mail salah!";
	}else{
		if($password1 != $password2){
			echo"password tidak sama";
		}else{
	
			//memaukkan data ke database
			$insert_user = mysql_query("insert login values ('','$nama_lengkap','$email','$password2')");
		
			//mengecek apakah data berhasil dimasukkan
			if($insert_user == 1){
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