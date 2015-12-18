<?php	
$id_user=$_GET['id_user'];

//menghapus data admin berdaarkan username
$delete_user=mysql_query("delete from login where id_user='$id_user'");
				if($delete_user){
					echo "data Telah di hapus";
						echo "<meta http-equiv=\"refresh\" content=\"0;url=?module=user.php&index=0\">";
				}else{
					echo"data gagal di hapus";
				}
?>