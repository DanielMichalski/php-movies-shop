<?php
	// dolacz plik szablonu
	require("include/top_site.php");
?>

<table border="0" cellpadding="0" cellspacing="0">
<tbody>

<tr>
<td valign="top">
<table border="0" cellpadding="0" cellspacing="0">

<tbody>
<tr>
<td><img src="images/win2_top.jpg" alt="" border="0" height="35" width="224"></td>
</tr>
<tr>
<td style="padding-left: 40px;" background="images/win2_back.jpg">
<table border="0" cellpadding="0" cellspacing="0">
<tbody>
<tr>
</tr>
<tr>
<td style="color: rgb(101, 101, 101);">Marka:</td>
</tr>
<tr>
<td>
<form action="show_cars.php" method="post" >
<select name="marka" style="width: 120px; color: #707070; font-size: 9pt;">
<?php
	// dynamiczne wyświetlanie marek samochodów w liscie <select>
	$query = "SELECT * FROM marka ORDER BY id_marki ASC";
	$wynik = mysql_query($query) or die ('Błąd: '. $mysql_error());
	
	while ($r = mysql_fetch_assoc($wynik)) {
		echo "<option value='".$r['id_marki']."'>". $r['nazwa_marki'] ."</option>";
	}
?>
</select>
</td>
</tr>
<tr>
<td style="color: rgb(101, 101, 101);">Model:</td>
</tr>
<tr>
<td><input name="q" size="15" maxlength="40" type="text" style="width: 120px; color: #707070; font-size: 9pt;" required></td>
</tr>
<tr>
<td align="center"><input src="images/search_but.jpg" alt="" style="padding-top: 10px;" border="0" height="25" type="image" width="150"> </td>
</form>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td><img src="images/win2_bottom.jpg" alt="" border="0" height="18" width="224"></td>
</tr>
</tbody>
</table>
</td>
<td valign="top">
<table border="0" cellpadding="0" cellspacing="0">
<tbody>
<tr>
<td valign="top"><img src="images/text1.jpg" alt="" border="0" height="35" width="316"></td>
</tr>
<tr>
<td style="padding-left: 20px; padding-right: 30px; color: rgb(104, 104, 104);">
Firma Auto Komis zajmuje się sprzedażą samochodów różnych marek. Działamy od 2000 roku</td>
</tr>
<tr>
<td style="padding-top: 20px;">
<ul type="disc">
<li> <a class="bez_podkreslenia" href="">Co nowego w 2012?</a></li>
<li><a class="bez_podkreslenia" href="">Adres dilera</a></li>
<li><a class="bez_podkreslenia" href="">Recenzje samochodów</a></li>
<li><a class="bez_podkreslenia" href="">Pomoc</a></li>
<li><a class="bez_podkreslenia" href="">Kontakt</a></li>
</ul>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td colspan="2"><img src="images/text2.jpg" alt="" border="0" height="42" width="540"></td>
</tr>
<tr>
<td colspan="2" background="images/pics_back.jpg" height="212">
<table border="0" cellpadding="0" cellspacing="0">
<tbody>


<?php
	//losowe wyswietlanie 8 samochodow z tabeli samochody na stronie głównej
	$query = "SELECT DISTINCT * FROM samochody ORDER BY RAND() LIMIT 8";
	$wynik = mysql_query($query) or die ('Błąd: '. $mysql_error());
	$licznik = 1;
	
	//podczas gdy beda zwracane wyniki...
	while ($r = mysql_fetch_assoc($wynik)) {
		if($licznik == 1 || $licznik == 5)
			echo "<tr>";
		echo "<td style='padding-left: 10px;'><map name='pic".$r['id_samochodu'] ."'><area shape='rect' coords='37,180,122,200' href='show_car.php?item=".$r['id_samochodu'] ."'></map><img src='images/pic".$r['id_samochodu'] .".jpg' alt='Obrazek samochodu' usemap='#pic".$r['id_samochodu'] ."' border='0' height='212' width='124'></td>";
	    if($licznik == 1 || $licznik == 5)
			echo "</td>";
		$licznik++;
	}
?>

</tbody>

</table>
</td>
</tr>

</tbody>
</table>



<?php
	// dolacz plik szablonu
	require("include/bottom_site.php");
?>