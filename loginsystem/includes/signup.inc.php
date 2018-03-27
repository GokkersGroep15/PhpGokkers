<?php
//als er op de onderstaande knop wordt gedrukt dan wordt er de onderstaande code uitgevoerd
if (isset($_POST['submit']) ) {
	
	include_once 'dbh.inc.php';

	//Dit zorgt voor beveiliging voor als iemand code schrijft in de sign up form en het vervolgens stuurt naar onze database.
	$first = mysqli_real_escape_string($conn, $_POST['first']);
	$last = mysqli_real_escape_string($conn, $_POST['last']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$uid = mysqli_real_escape_string($conn, $_POST['uid']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

	//Error handlers
	//Checkt of er lege velden zijn,
	if (empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd)) {
		//dan komt er dit te staan in de url 
		header("Location: ../signup.php?signup=empty");
		exit();
	}

	else{
		//Checkt of de input gevalideerde characters heeft
		//Wat er hieronder gebeurt is : Er wordt gekeken of er andere tekens zijn ingevoerd dan wat er hieronder staat. 
		if (!preg_match("/^[a-zA-Z]*$/", $first) || (!preg_match("/^[a-zA-Z]*$/", $last) ) ) {
			header("Location: ../signup.php?signup=invalid");
			exit();
		}
		else{
			//Checkt of e-mail correct is
			//filter_var checkt een string of die correct is met behulp van een php methode. In dit geval FILTER_VALIDATE_EMAIL 
			if (!filter_var($email, FILTER_VALIDATE_EMAIL) ) {
				header("Location: ../signup.php?signup=email");
				exit();
			}

			//Nu gaan we checken of de gebruiksnaam van de gebruiker al in gebruik is in de database ofniet.
			//We gaan dus een verbinding maken met de databse en checken of er users zijn met die gebruiksnaam.
			else{
				//in deze lijn zeggen we dat alles geselecteerd moet worden van de table users waarin de user_uid (gebruiksnaam) gelijk is aan wat er ingevoerd is
				$sql = "SELECT * FROM users WHERE user_uid= '$uid'";

				//Nu ga ik de bovenstaande regel runnen in mijn database
				$result = mysqli_query($conn, $sql);

				//Nu wordt er gecheckt of er een resultaat heeft plaatsgevonden
				$resultCheck = mysqli_num_rows($result);

				//Nu gaan we elke keer dat er een resultaat is (dus als het aantal resultaten meer is dan 0) dan laten we een message achter
				if ($resultCheck > 0) {
					header("Location: ../signup.php?signup=usertaken");
					exit();
				}

				else{
					//Nu gaan we de wachtwoord hashen waardoor niemand waaronder ik niet het wachtwoord te zien krijg via de database

					$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

					//De gebruik wordt door deze regel in de daabase toegevoegd
					$sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd) VALUES ('$first', '$last', '$email', '$uid', '$hashedPwd');";
					mysqli_query($conn, $sql);
					header("Location: ../signup.php?signup=succes");
					exit();
				}

			}
		}
	}
}
else{
	header("Location: ../signup.php");
	exit();
}

?>