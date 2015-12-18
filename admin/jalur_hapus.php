<?php	
$id_jalur=$_GET['id_jalur'];

//menghapus data admin berdaarkan username
$delete_jalur=mysql_query("delete from jalur where id_jalur='$id_jalur'");
				if($delete_jalur){
					echo "data Telah di hapus";
						echo "<meta http-equiv=\"refresh\" content=\"0;url=?module=jalur.php&index=0\">";
				}else{
					echo"data gagal di hapus";
				}
?>