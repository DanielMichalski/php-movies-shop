<?php
	require('include/top_site.php');
	
	// jesli zostal klikniety przycisk zaloguj
	if(isset($_POST['zaloguj'])) { 
		if(!empty($_POST['login']) && !empty($_POST['password'])) {
			$login = mysql_real_escape_string(trim($_POST['login']));
			$password = sha1(mysql_real_escape_string (trim($_POST['password'])));
			
			$query = "SELECT id_uzytkownika, login FROM kupujacy WHERE login='".$login."' && password='".$password."' "; // pokaz liste wierszy ktorych login i haslo odpowiada podanym w formularzu
			$temp = mysql_query($query) or die ("blad w zapytaniu select.");
			
			// jesli liczba wierszy jest wiekasza od zera zaloguj uzytkownika i ustaw zmienne sesyjne
			if(mysql_num_rows($temp) > 0 ) {
				// ustaw zmienne sesyjne odpowiedzialne za zalogowanie użytkownika
				$_SESSION['login']= $login;
				$_SESSION['zalogowany'] = 'true';
				$r = mysql_fetch_assoc($temp);
				$_SESSION['id_uzytkownika'] = $r['id_uzytkownika'];
				
				if(!empty($_GET['url'])) {
					header('Location: '.$_GET['url']);
					exit();
				}
				else {
					header("Location: index.php");
					exit();
				}
				
			} else {
				$tablica_bledow[] = "Niepoprawny login lub błędne hasło"; // jesli dane nie zgadzaja sie z danymi w bazie danych dodaj do tablicy tablica_bledów[] wpis o niepoprawnym loginie lub hasle
			}
			
			
		
		} else {
			// jesli nie podales loginu
			if(empty($_POST['login'])) {
				$tablica_bledow[] = "Nie podałeś loginu.";
				$blad_login = 'pusta';
			}
			
			// jesli nie podałeś hasła
			if(empty($_POST['password'])) {
				$tablica_bledow[] = "Nie podałeś hasła.";
				$blad_password = 'pusta';
			}
			
		}
	}
	
?>

<?php
		if(isset($_GET['info'])) { // jesli zmienna $_GET['info'] jest uswawiona to wyswietla komunikat ktory sie w niej zawiera
			echo "<p id='zielony_komunikat'>".$_GET['info'].'</p>';
		}
		// jesli sa jakies bledy to je wyswietl
		if(!empty($tablica_bledow)) {
					echo '<fieldset id="lista_bledow"><legend>Lista bledow</legend>';
					// wyświetl każdy element tablicy $tablica_bledow odpowiedzialna za przchowywanie komunikatów o błędach
					foreach ($tablica_bledow as $element) {
						echo $element . "</br>";
					}
					echo '</fieldset>';
		}	
?>
<p>
</p><br />
  Zaloguj się. Jeśli nie masz u nas konta <a style="font-size: 9pt; text-decoration: " href="rejestracja.php"> zarejestruj się </a> <br /><br /><br />

    <div id="logowanie" style="width: 250px;">
        <form action="<?php if(!empty($_GET['url'])) echo "login.php?url=".$_GET['url']; else echo "login.php"; ?>" method="post">
        <fieldset style='border-radius: 8px;'>
          <legend>Logowanie</legend>
          <table>
            <tr> 
                <th width="64" style="padding: 10px;"> Login: </th>
                <td width="177"> <input type="text" value="<?php if(!empty($_POST['login'])) echo $_POST['login']; ?>" class="<?php if(!empty($blad_login)) echo $blad_login; ?>" required autofocus maxlength="30" name="login" /> </td>
            </tr>
            <tr>
                <th style="padding: 10px;"> Hasło: </th>
                <td> <input type="password" class="<?php if(!empty($blad_password)) echo $blad_password; ?>" maxlength="30" name="password" required/> </td>
            </tr>
            <tr>
                <td></td>
                <td> <input type="reset" value="Resetuj" /> <input type="submit" name="zaloguj" value="zaloguj" /> </td>
            </tr>
        </table>
        
        </fieldset>
        </form>
        <br /> 
        <p><a href="index.php">Powrót do strony głównej</a></p>
	</div>

<?php
	// dolacz plik szablonu
	require('include/bottom_site.php');
?>