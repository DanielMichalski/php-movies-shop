<?php
	require('include/top_site.php');
?>    
	 
     
<?php
	 // jesli zmienna $_GET['id'] nie jest ustawiona przekieruj na strone glowna i zakoncz skrypt
	 if(!isset($_GET['id']) || !isset($_SESSION['login'])) {
	 	header('Location: index.php');
		exit();
	 }
	 // usuwanie informacji o zamowionej jezdzie probnej
	 $query = "DELETE FROM zamowiona_jazda_probna WHERE id_zamowienia = ".$_GET['id']." LIMIT 1";
	 $data = mysql_query($query) or die('Wystapil blad podczas kasowania');
	 // powrot na strone z zamówieniami
	 header('Location: my_orders.php');
	 exit();
	 
?>
        
   
    
<?php
	require('include/bottom_site.php');
?>