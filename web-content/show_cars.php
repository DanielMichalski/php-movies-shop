<?php
	require("include/top_site.php");
?>

<?php
	 // w zaleznosci od stanu zmiennych $_GET i $_POST zadaj odpowiednie zapytanie do bazy danych
	 if(!empty($_GET['id_marki'])) {
	 	$query = "SELECT * FROM samochody LEFT JOIN marka ON samochody.id_marki = marka.id_marki LEFT JOIN kategoria ON samochody.id_kategorii = kategoria.id_kategorii WHERE samochody.id_marki ='".$_GET['id_marki']."'";
	 }
	 else if(!empty($_GET['id_kategorii'])) {
	 	$query = "SELECT * FROM samochody LEFT JOIN marka ON samochody.id_marki = marka.id_marki LEFT JOIN kategoria ON samochody.id_kategorii = kategoria.id_kategorii WHERE samochody.id_kategorii ='".$_GET['id_kategorii']."'";
	 }
	 else if(!empty($_POST['q']) && empty($_POST['marka'])) {
	 	$query = "SELECT * FROM samochody LEFT JOIN marka ON samochody.id_marki = marka.id_marki LEFT JOIN kategoria ON samochody.id_kategorii = kategoria.id_kategorii WHERE samochody.nazwa_samochodu LIKE '%".$_POST['q']."%'"; 
		$text = "<div class='komunikat_orders'>Twoja fraza wyszkukiwania to: '". $_POST['q']."'</div>";
	 }
	 else if(!empty($_POST['q']) && (!empty($_POST['marka']))) {
			$query = "SELECT * FROM samochody LEFT JOIN marka ON samochody.id_marki = marka.id_marki LEFT JOIN kategoria ON samochody.id_kategorii = kategoria.id_kategorii WHERE samochody.nazwa_samochodu LIKE '%".$_POST['q']."%' AND samochody.id_marki ='".$_POST['marka']."'"; 
			$text = "<div class='komunikat_orders'>Twoja fraza wyszkukiwania to: '". $_POST['q']."'</div>";
	 }
	 else {
	 	$query = "SELECT * FROM samochody LEFT JOIN marka ON samochody.id_marki = marka.id_marki LEFT JOIN kategoria ON samochody.id_kategorii = kategoria.id_kategorii ORDER BY rand() LIMIT 30";
	 }
	 
	 $wynik = mysql_query($query) or die ("Wystapil blady przy zapytaniu SELECT");
	 
	 if (!empty($text)) {
		 	echo "<p id='fraza'>".$text."</p>";
		 }
	 
	 if(mysql_num_rows($wynik) > 0) {  // jesli wyników jest więcej od 0 to wyświetl je
		 echo "<table id='produkty_table' style='text-align: center;'> <tr><th></th><th>Nazwa</th><th>Pojemność w cm3</th><th>Marka</th><th>Kategoria</th><th>Kolor</th></tr>";
		 while ($r = mysql_fetch_assoc($wynik)) {
			 echo "<tr><td><a href='show_car.php?item=".$r['id_samochodu']."'><img src='".$r['link_do_zdjecia']."'/></a> </td><td><a href='show_car.php?item=".$r['id_samochodu']."'>".$r['nazwa_samochodu']."</a></td><td>".$r['pojemnosc_w_cm3']."</td>";
			 echo "<td><a href='show_cars.php?id_marki=".$r['id_marki']."'>".$r['nazwa_marki']."</a></td><td><a href='show_cars.php?id_kategorii=".$r['id_kategorii']."'>".$r['nazwa_kategorii']."</a></td><td>".$r['kolor']."</td></tr>";
		 }
		 echo "</table>";

	 }
	 else if (isset($_POST['q'])) {
		 echo "<br /><p> Nie znaleziono samochodów odpowiadających kryteriom wyszukiwania.</p>";
	 }
	 
?>

 <br />  
    <p style='padding-left: 6px; padding-bottom: 20px;'><a href="index.php">Powrót do strony głównej</a></p>

<?php
	require("include/bottom_site.php");
?>