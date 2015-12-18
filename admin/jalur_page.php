<?php
$query_jalur=mysql_query("select * from jalur");
$sum_jalur=mysql_num_rows($query_jalur);
$sum_page=ceil($sum_jalur/10);
$page=1;
$index=0;

while($page<=$sum_page){
	
		echo "<li><a href='index.php?module=jalur.php&index=$index'>$page</a> </li>";
	
$page=$page+1;
$index=$index+10;
}

?>