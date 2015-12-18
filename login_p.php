<?php
session_start();
include "lib/koneksi.php"; 

$username = trim(htmlentities(strip_tags(nl2br($_POST['username']))));
$password = nl2br(trim(strip_tags(MD5($_POST['password']))));
$status = $_POST['status'];
	
if ($username == "" || $password =="") {
	echo "<script>window.alert('form tidak boleh kosong');
        window.location=('login.php')</script>";
}else{
		$query_login = mysql_query("select * from login where email ='$username' and password ='$password'");
		$sum_login = mysql_num_rows($query_login);
	
		if($sum_login == "") {
			echo "<script>window.alert('username atau password salah');
        window.location=('login.php')</script>";
		}else{

		$view_login=mysql_fetch_array($query_login);
		$username=$view_login['email'];
		$password=$view_login['password'];
		
		$_SESSION['username']=$username;
		$_SESSION['password']=$password;
		$_SESSION['siangkutan']=1;
		
		echo "<meta http-equiv=\"refresh\" content=\"0;url=admin/index.php?data=home.php\">";	
		}
}
?>

