<?php
$query_angkot=mysql_query("select * from angkot");
$sum_angkot=mysql_num_rows($query_angkot);
$sum_page=ceil($sum_angkot/10);
$page=1;
$index=0;

while($page<=$sum_page){
	
		echo "<li><a href='index.php?module=angkot.php&index=$index'>$page</a> </li>";
	
$page=$page+1;
$index=$index+10;
}

?>
