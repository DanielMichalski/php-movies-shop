<?php
	require('include/top_site.php');
?> 


<?php
	// jesli nie jesteśmy zalogowani przenieś do strony logowania z komunikatem, żebyśmy się zalogowali aby mieć dostęp do tej strony
	if (!isset($_SESSION['login']) || (!isset($_SESSION['id_uzytkownika']))) {
		$info ="Zaloguj się aby mieć dostęp do tej strony.";
		header("Location: login.php?info=".$info."&backurl=my_orders.php");
		exit();
	}
	// zapytanie, które znajduje nasze samochody ktore dodalismy do tabeli 'zamowiona_jazda_probna'
	$query = "SELECT * FROM  `zamowiona_jazda_probna` LEFT JOIN samochody ON zamowiona_jazda_probna.id_samochodu = samochody.id_samochodu LEFT JOIN marka ON samochody.id_marki = marka.id_marki WHERE id_uzytkownika = ".$_SESSION['id_uzytkownika'];
	$wynik = mysql_query($query) or die ("Wystapil blady przy zapytaniu SELECT");
	 // jesli zmienna $text nie jest pusta wyswietl ją
	 if (!empty($text)) {
		 	echo "<p id='fraza'>".$text."</p>";
		 }
		 
	 // jesli wynik zapytania o ilosc znalezionych wierszy jest większy od zera to wyswietl samochody ktore dodalismy do jazdy probnej
	 if(mysql_num_rows($wynik) > 0) {
		 echo "<br /><p>Samochody, które zostały wybrane na jazdę próbną</p><br />";
		 echo "<table id='produkty_table' style='text-align: center;'> <tr><th></th><th>Nazwa</th><th>Data dodania</th><th>Marka</th><th>Usuwanie</th></tr>";
		 // podczas gdy funkcja zwraca wyniki wyswietl dane o samochodzie
		 while ($r = mysql_fetch_assoc($wynik)) { 
			 echo "<tr><td><a href='show_car.php?item=".$r['id_samochodu']."'><img src='".$r['link_do_zdjecia']."'/></a> </td><td><a href='show_car.php?item=".$r['id_samochodu']."'>".$r['nazwa_samochodu']."</a></td><td>".$r['data_zamowienia']."</td>";
			 echo "<td><a href='show_cars.php?id_marki=".$r['id_marki']."'>".$r['nazwa_marki']."</a></td><td><a href='usun.php?id=".$r['id_zamowienia']."'>Usun</a></td></tr>";
		 }//end while
		 echo "</table>";
	 } else {
		// jesli wynik zapytania < lub = 0 wyswietl komunikat
	 	echo "<p id='zielony_komunikat'>Nie masz zaplanowanych jazd próbnych</p>";
	 }
	 
?>

<?php
	require('include/bottom_site.php');
?>