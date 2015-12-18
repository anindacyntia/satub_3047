<?php
$query_jalan=mysql_query("select * from jalan");
$sum_jalan=mysql_num_rows($query_jalan);
$sum_page=ceil($sum_jalan/10);
$page=1;
$index=0;

while($page<=$sum_page){
	
		echo "<li><a href='index.php?module=jalan.php&index=$index'>$page</a> </li>";
	
$page=$page+1;
$index=$index+10;
}

?>
