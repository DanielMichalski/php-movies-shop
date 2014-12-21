<?php
	$connect = mysql_connect('mysql8.000webhost.com','a6263621_auto','slabehaslo1');
	mysql_select_db('a6263621_auto',$connect) or die ('Nie udalo sie polaczyc z bazą danych');
	mysql_query("SET NAMES 'utf8'") or die ('blad kodowania utf8');
?>

