<?php
	$connect = mysql_connect('localhost','root','');
	mysql_select_db('auto_komis',$connect) or die ('Nie udalo sie polaczyc z bazą danych');
	mysql_query("SET NAMES 'utf8'") or die ('blad kodowania utf8');
?>

