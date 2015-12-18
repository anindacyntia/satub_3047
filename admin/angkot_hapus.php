<?php	
$id_angkot=$_GET['id_angkot'];

//menghapus data admin berdaarkan username
$delete_angkot=mysql_query("delete from angkot where id_angkot='$id_angkot'");
				if($delete_angkot){
					echo "data Telah di hapus";
						echo "<meta http-equiv=\"refresh\" content=\"0;url=?module=angkot.php&index=0\">";
				}else{
					echo"data gagal di hapus";
				}
?>