<?php
$query_berita=mysql_query("select * from berita");
$sum_berita=mysql_num_rows($query_berita);
$sum_page=ceil($sum_berita/10);
$page=1;
$index=0;

while($page<=$sum_page){
	
		echo "<a href='index.php?module=berita.php&index=$index'>$page</a> |";
	
$page=$page+1;
$index=$index+10;
}

?>