<?
	session_start();
	unset($_SESSION['username']);
	unset($_SESSION['password']);
	unset($_SESSION['siangkutan']);
	echo "<meta http-equiv=\"refresh\" content=\"0;index.php\">";
?>