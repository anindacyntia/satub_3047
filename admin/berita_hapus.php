<?php	
$id_berita=$_GET['id_berita'];

//menghapus data admin berdaarkan username
$delete_berita=mysql_query("delete from berita where id_berita='$id_berita'");
				if($delete_berita){
					echo "data Telah di hapus";
						echo "<meta http-equiv=\"refresh\" content=\"0;url=?module=berita.php&index=0\">";
				}else{
					echo"data gagal di hapus";
				}
?>
