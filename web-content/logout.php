<?php
	// niszczymy sesję, usuwamy zmienne sesyjne oraz przekierowywujemy na stronę główną
	session_start();
	session_destroy();
	$_SESSION = array();
	// przekieruj na stronę główną
	header("Location: index.php");
?>