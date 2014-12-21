<?php
	require("include/top_site.php");
?>


		<?php
			if (isset($_POST['zarejestruj'])) {  // jesli zostal klikniety przycisk zarejestruj
				if (!empty($_POST['imie']) && !empty($_POST['nazwisko']) && !empty($_POST['e-mail']) && !empty($_POST['ulica']) && !empty($_POST['nr_budynku']) && !empty($_POST['nr_mieszkania']) && !empty($_POST['miejscowosc']) && !empty($_POST['kod_pocztowy']) && !empty($_POST['login']) && !empty($_POST['pass1']) && !empty($_POST['pass2']) && ($_POST['pass1'] == $_POST['pass2'])) {
						// zapisz zmiennych dane z formularza, dodatkowo pozbadz sie niepotrzebnym spacji i dodaj znak "\" przed znakami specjalnymi 
						$imie = mysql_real_escape_string (trim($_POST['imie']));
						$nazwisko = mysql_real_escape_string (trim($_POST['nazwisko']));
						$email = mysql_real_escape_string (trim($_POST['e-mail']));
						$ulica = mysql_real_escape_string (trim($_POST['ulica']));
						$nr_budynku = mysql_real_escape_string (trim($_POST['nr_budynku']));
						$nr_mieszkania = mysql_real_escape_string (trim($_POST['nr_mieszkania']));
						$miejscowosc = mysql_real_escape_string (trim($_POST['miejscowosc']));
						$kod_pocztowy = mysql_real_escape_string (trim($_POST['kod_pocztowy']));
						$login = mysql_real_escape_string (trim($_POST['login']));
						$pass1 = sha1(mysql_real_escape_string (trim($_POST['pass1'])));
						
						$ile = mysql_query("SELECT * FROM kupujacy WHERE login = '$login'");
						$how_much = mysql_num_rows($ile);
						if ($how_much == 0)  // jesli nie ma uzytkownika o podanym przez nam loginie to zarejestruj nowego
						{
							$query = "INSERT INTO kupujacy (login,password,imie,nazwisko,email,ulica,nr_budynku,nr_mieszkania,miejscowosc,kod_pocztowy,data_rejestracji) VALUES 				('$login','$pass1','$imie','$nazwisko','$email','$ulica','$nr_budynku','$nr_mieszkania','$miejscowosc','$kod_pocztowy',NOW())";
							mysql_query($query) or die ("Wystapil blad przy dodawaniu uzytkownika do bazy danych");
							// przekieruj na stronę logowania
							header("Location: login.php?info=Gratulacje. Zarejestrowałeś się. Możesz się teraz zalogować.");
							exit();
							
							
						} else {
							$tablica_bledow[] = "Podany uzytokwnik już istnieje.";
							$blad_login = 'pusta';
						}
				}
				else {
					if (empty($_POST['imie'])) {
						$tablica_bledow[] = "Nie podaleś imienia.";
						$blad_imie = 'pusta'; // ustawienie tej zmiennej pomoze nam potem ustawic klase dla pola <input type='tekst'>
											  // dzieki ktorej bedzie mial czerwona obramówkę przy nie podaniu danych
					}
					if (empty($_POST['nazwisko'])) {
						$tablica_bledow[] = "Nie podaleś nazwiska.";
						$blad_nazwisko = 'pusta';
					}
					if (empty($_POST['e-mail'])) {
						$tablica_bledow[] = "Nie podaleś adresu e-mail.";
						$blad_e_mail = 'pusta';
					}
					if (empty($_POST['ulica'])) {
						$tablica_bledow[] = "Nie podaleś nazwy ulicy.";
						$blad_ulica = 'pusta';
					}
					if (empty($_POST['nr_budynku'])) {
						$tablica_bledow[] = "Nie podaleś numeru budynku.";
						$blad_nr_budynku = 'pusta';
					}
					if (empty($_POST['nr_mieszkania'])) {
						$tablica_bledow[] = "Nie podaleś numeru mieszkania.";
						$blad_nr_mieszkania = 'pusta';
					}
					if (empty($_POST['miejscowosc'])) {
						$tablica_bledow[] = "Nie podaleś nazwy miejscowości.";
						$blad_miejscowosc = 'pusta';
					}
					if (empty($_POST['kod_pocztowy'])) {
						$tablica_bledow[] = "Nie podaleś kodu pocztowego.";
						$blad_kod_pocztowy= 'pusta';
					}
					if (empty($_POST['login'])) {
						$tablica_bledow[] = "Nie podaleś loginu.";
						$blad_login = 'pusta';
					}
					if (empty($_POST['pass1'])) {
						$tablica_bledow[] = "Nie podaleś pierwszego hasła.";
						$blad_pass1 = 'pusta';
						$blad_pass2 = 'pusta';
					}
					if (empty($_POST['pass2'])) {
						$tablica_bledow[] = "Nie podaleś drugiego hasla.";
						$blad_pass1 = 'pusta';
						$blad_pass2 = 'pusta';
					}
					// jesli zmienna POST pass1 i pass2 nie jest pusta
					if(!empty($_POST['pass1']) && !empty($_POST['pass2'])) {
						// jesli zmienne POST pass1 i pass2 nie są takie same
						if($_POST['pass1'] != $_POST['pass2']) {
							$tablica_bledow[] = "Podane hasła nie są jednakowe.";
							$blad_pass1 = 'pusta';
							$blad_pass2 = 'pusta';
						}
					}
					
				}
				
			}
?>

<?php
	if(!empty($tablica_bledow)) {
					// wyswietl tablice bledów podczas rejestracji
					echo '<fieldset id="lista_bledow"><legend>Lista bledow</legend>';
					foreach ($tablica_bledow as $element) {
						echo $element . "</br>";
					}
					echo '</fieldset><br /> <br />';
	}
?>


		<div id="div_rejestracja">
		<h2>Rejestracja nowego użytkownika</h2>
        <!--Wyswietl formularz rejestracyjny-->
		<fieldset style="width: 255px; border-radius: 8px;">
        	<legend>Rejestracja</legend>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <table>
        	<tr>
        		<th>Imię: </th>
                <td><input type="text" maxlength="30" name="imie" class="<?php if(!empty($blad_imie)) echo $blad_imie; ?>" value="<?php if(!empty($_POST['imie'])) echo $_POST['imie']; ?>" required/></td>
        	</tr>
            <tr>
        		<th>Nazwisko: </th>
                <td><input type="text" maxlength="30" name="nazwisko" class="<?php if(!empty($blad_nazwisko)) echo $blad_nazwisko; ?>" value="<?php if(!empty($_POST['nazwisko'])) echo $_POST['nazwisko']; ?>" required/></td>
        	</tr>
            <tr>
        		<th>E-mail: </th>
                <td><input maxlength="50" type="email" name="e-mail" class="<?php if(!empty($blad_e_mail)) echo $blad_e_mail; ?>" value="<?php if(!empty($_POST['e-mail'])) echo $_POST['e-mail']; ?>" required /></td>
        	</tr>
            	</tr>
            <tr>
        		<th>Ulica: </th>
                <td><input type="text" maxlength="50" name="ulica" class="<?php if(!empty($blad_ulica)) echo $blad_ulica; ?>" value="<?php if(!empty($_POST['ulica'])) echo $_POST['ulica']; ?>" required/></td>
        	</tr>
            	</tr>
            <tr>
        		<th>Nr budynku: </th>
                <td><input type="text" maxlength="10" name="nr_budynku" class="<?php if(!empty($blad_nr_budynku)) echo $blad_nr_budynku; ?>" value="<?php if(!empty($_POST['nr_budynku'])) echo $_POST['nr_budynku']; ?>" required/></td>
        	</tr>
            	</tr>
            <tr>
        		<th>Nr mieszkania: </th>
                <td><input type="text" maxlength="10" name="nr_mieszkania" class="<?php if(!empty($blad_nr_mieszkania)) echo $blad_nr_mieszkania; ?>" value="<?php if(!empty($_POST['nr_mieszkania'])) echo $_POST['nr_mieszkania']; ?>" required/></td>
        	</tr>
            	</tr>
            <tr>
        		<th>Miejscowosc: </th>
                <td><input type="text" maxlength="50" name="miejscowosc" class="<?php if(!empty($blad_miejscowosc)) echo $blad_miejscowosc; ?>" value="<?php if(!empty($_POST['miejscowosc'])) echo $_POST['miejscowosc']; ?>" required/></td>
        	</tr>
            <tr>
        		<th>Kod pocztowy: </th>
                <td><input type="text" maxlength="5" name="kod_pocztowy" class="<?php if(!empty($blad_kod_pocztowy)) echo $blad_kod_pocztowy; ?>" value="<?php if(!empty($_POST['kod_pocztowy'])) echo $_POST['kod_pocztowy']; ?>"required/></td>
        	</tr>
            <tr>
        		<th>Login: </th>
                <td><input type="text" maxlength="30" name="login" class="<?php if(!empty($blad_login)) echo $blad_login; ?>" value="<?php if(!empty($_POST['login'])) echo $_POST['login']; ?>" required/></td>
        	</tr>
            <tr>
        		<th>Hasło: </th>
                <td><input type="password" maxlength="30" name="pass1" class="<?php if(!empty($blad_pass1)) echo $blad_pass1; ?>" required/></td>
        	</tr>
            <tr>
        		<th>Powtórz hasło: </th>
                <td><input type="password" maxlength="30" name="pass2" class="<?php if(!empty($blad_pass2)) echo $blad_pass2; ?>" required/></td>
        	</tr>
            <tr>
            	<th></th>
                <td> <input type="reset" value="Usuń" /> 
                <input type="submit" value="Zarejestruj" name="zarejestruj" /> </td>
            </tr>
        
        </table>
        </form>
        </fieldset>
        
        <br /> 
   		<p><a href="index.php">Powrót do strony głównej</a></p>

        </div>
        
         

<?php
	require("include/bottom_site.php");
?>