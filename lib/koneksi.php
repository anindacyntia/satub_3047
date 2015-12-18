<?php
$host  ="localhost";
$user ="satub";
$pass ="satub";
$database ="satub_3047";

$koneksi =mysql_connect($host,$user,$pass) or die ("Maaf Web Gagal Koneksi".mysql_error());
mysql_select_db($database) or die ("Maaf Database Web Tidak Ditemukan");
?>