<?php
	require("include/top_site.php");
?>
<div id="body">
<?php

	if(isset($_GET['item'])) { // jesli zmienna $_GET['item'] jest ustawiona
		if(isset($_SESSION['zalogowany']) && $_SESSION['zalogowany'] == 'true') {  // jesli uzytkownik jest zalogowany
			$query = "SELECT id_zamowienia FROM zamowiona_jazda_probna WHERE id_uzytkownika=".$_SESSION['id_uzytkownika']." AND id_samochodu=".$_GET['item'];
		 	$wynik = mysql_query($query) or die ("Wystapil blady przy zapytaniu SELECT");
			$ile_wierszy = mysql_num_rows($wynik); // ile wyników zwróciła baza danych
			
			// jesli kliknieta w przycisk o nazwie "submit" dodaj rekord do tebeli zamowiona_jazda_probna i przekieruj na strone my_orders.php
			if(isset($_POST['submit'])) {
				$query = "INSERT INTO zamowiona_jazda_probna (data_zamowienia, id_uzytkownika, id_samochodu) VALUES (NOW(), ".$_SESSION['id_uzytkownika'].", ".$_POST['item'].")"; // zapisz w bazie dane dotyczace zapisania sie na jazdę próbna
				$data = mysql_query($query) or die ("blad przy dodawaniu do zamowienia do bazy (linia 10)");
				header("Location: my_orders.php"); // przekieruj na strone główną
				exit();
			} else {
				echo "<form action='".$_SERVER['PHP_SELF']."?item=".$_GET['item']."' method='post'>";
			}
		}
		else
		{
			echo "<form action='login.php?url=show_car.php?item=".$_GET['item']."' method='POST'>"; // jesli uzytkownik jest nie zalogowany to po kliknieciu na przycisk 'submit' zostanie przeniesiony na strone logowania
		}

		 $query = "SELECT * FROM samochody LEFT JOIN kategoria ON samochody.id_kategorii = kategoria.id_kategorii WHERE id_samochodu='".$_GET['item']."'";
		 $wynik = mysql_query($query) or die ("Wystapil blady przy zapytaniu SELECT");
		 	$r = mysql_fetch_assoc($wynik); // zapisz w zmiennej $r dane o samochodzie pobrane z bazy danych
			// wyswietlenie danych o konkretnym samochodzie o id pobranym z $_GET['item']
			echo "<input type='hidden' name='item' value='".$r['id_samochodu']."' />";
			echo "<p>".$r['nazwa_samochodu']."</p> <br />";
			echo "<img src='".$r['link_do_zdjecia']."' style='height: 250px; width: 350px; border= 1px solid #666;' /><br /><br />";
			echo "<fieldset style='width: 480px; border-radius: 8px;'><legend>Specyfikacje</legend>Pojemność silnika: ".$r['pojemnosc_w_cm3']."cm3 <br />Kolor: ".$r['kolor']." <br />";
			echo "Typ: ".$r['nazwa_kategorii']." <br />Prędkość maksymanlna w km/h: ".$r['predkosc_maksymalna']." <br />Ładowność: ".$r['ladownosc']."kg</fieldset><br />";
			echo "<fieldset style='width: 480px; border-radius: 8px;'><legend>Opis</legend>".$r['opis_produktu']."</fieldset><br />";
			if (isset($ile_wierszy) && ($ile_wierszy != 0))  {
				echo "<p id='zielony_komunikat'>Zapisałeś się już na jazdę próbną</p>";
			} else {
			    echo "<input type='button' onClick='javascript: history.back()' value='Powrót' />"; // powrot na strone poprzednia wykorzystujac funkcję JavaScript
				echo "<input type='submit' value='Zapisz na jazde próbną' name='submit' />";  // przycisk potwierdzający
			}
	 }
	 else {
		// jesli zmienna $_GET['item'] nie jest ustawiona przekieruj na strone głowna serwisu
	 	header('Location: index.php');
		exit();
	 }
	 echo "</form>";
	 	
?>
</div>
<?php
	require("include/bottom_site.php");
?>
