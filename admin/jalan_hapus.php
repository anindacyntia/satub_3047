<?php	
$id_jalan=$_GET['id_jalan'];

//menghapus data admin berdaarkan username
$delete_jalan=mysql_query("delete from jalan where id_jalan='$id_jalan'");
				if($delete_jalan){
					echo "data Telah di hapus";
						echo "<meta http-equiv=\"refresh\" content=\"2;url=?module=jalan.php&index=0\">";
				}else{
					echo"data gagal di hapus";
				}
?>