<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><head><title>Auto Komis</title>
<link rel="stylesheet" type="text/css" href="css/screen.css">
<script src="js/script1.js" type="text/javascript" charset="utf-8"></script>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-20800630-3']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	 })();

</script>
</head><body onload="MM_preloadImages('images/b1r.jpg','images/b2r.jpg','images/b3r.jpg','images/b4r.jpg','images/b5r.jpg','images/b6r.jpg')">
<!-- StatisticsCounter v:2.4.1 -->
<script type="text/javascript"><!-- bd = "http://www.grandstats.com/counter.php?id=42"; ur = bd+"&w="+screen.width+"&r="+escape(document.referrer)+"&u="; ur += escape(document.location)+"&t="+escape(document.title); ur += "&java=1"+"&sc_random="+Math.random(); document.write('<img src="'+ur+'" height=1 width=1 border="0">');//--> </script>

<table border="0" cellpadding="0" cellspacing="0" height="100%">
<tbody>
<tr>
<td background="images/bg.jpg" width="50%"></td>
<td style="padding-left: 28px;" background="images/bg_lft.jpg" valign="top" width="28"></td>
<td bgcolor="#ffffff" height="100%" valign="top">
<table border="0" cellpadding="0" cellspacing="0" height="100%">
<tbody>
<tr>
<td colspan="2" id='gora'>

<?php 
		session_start();

		require('include/db_connect.php');
		if (isset($_SESSION['login']) && isset($_SESSION['id_uzytkownika'])) {
			echo "Witaj ";
			echo "<a href='my_orders.php'>".$_SESSION['login']. "!</a> <a href='logout.php'>Wyloguj</a>";
			
		}
		else {
			echo "Nie jesteś zalogowany. <a href='login.php'> Zaloguj </a> <b>|</b> <a href='rejestracja.php'>Zarejestruj</a>";
		}
?>

</td>


</tr>
<tr>
<td colspan="2"><img src="images/slogan22.jpg" alt="" border="0" height="201" width="402"><img src="images/slogan2.jpg" alt="" border="0" height="201" width="368"></td>
</tr>
<tr>
<td colspan="2">
    <a href="index.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image4','','images/b1r.jpg',1)"><img src="images/b1.jpg" name="Image4" border="0" height="44" width="151"></a>
    <a href="show_cars.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image5','','images/b2r.jpg',1)"><img src="images/b2.jpg" name="Image5" border="0" height="44" width="151"></a>
    <a href="my_orders.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image6','','images/b3r.jpg',1)"><img src="images/b3.jpg" name="Image6" border="0" height="44" width="151"></a>
    <a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image7','','images/b4r.jpg',1)"><img src="images/b4.jpg" name="Image7" border="0" height="44" width="151"></a>
    <a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image8','','images/b5r.jpg',1)"><img src="images/b5.jpg" name="Image8" border="0" height="44" width="150"></a>
</td>
</tr>
<tr>
<td colspan="2"><img src="images/shadow.jpg" alt="" border="0" height="27" width="770"></td>
</tr>
<tr>
<td height="100%" valign="top">
<table border="0" cellpadding="0" cellspacing="0">
<tbody>
<tr>
<td><img src="images/win1_top.jpg" alt="" border="0" height="35" width="230"></td>
</tr>
<tr>
<td style="padding-left: 50px;" background="images/win1_back.jpg">

<img src="images/small.gif" alt="" border="0" height="12" width="14">&nbsp;&nbsp;<a class="bez_podkreslenia" href="show_cars.php?id_kategorii=1">Osobowe</a> <br>
<a href="show_cars.php?id_marki=1" class="podkategoria">BMW</a> <br>
<a href="show_cars.php?id_marki=2" class="podkategoria">Mercedes</a> <br>
<img src="images/small.gif" alt="" border="0" height="12" width="14">&nbsp;&nbsp;<a class="bez_podkreslenia" href="show_cars.php?id_kategorii=2">Dostawcze</a> <br>
<a href="show_cars.php?id_marki=3" class="podkategoria">Opel</a> <br>
	
</td>
</tr>
<tr>
<td valign="top"><img src="images/win1_bottom.jpg" alt="" border="0" height="19" width="230"></td>
</tr>
</tbody>
</table>
</td>
<td height="100%" valign="top">





