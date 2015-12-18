<?php
$query_user=mysql_query("select * from login");
$sum_user=mysql_num_rows($query_user);
$sum_page=ceil($sum_user/10);
$page=1;
$index=0;

while($page<=$sum_page){
	
		echo "<li><a href='index.php?module=user.php&index=$index'>$page</a> </li>";
	
$page=$page+1;
$index=$index+10;
}

?>