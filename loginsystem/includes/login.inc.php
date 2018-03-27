<?php

session_start();

//als er op de onderstaande knop wordt gedrukt dan wordt er de onderstaande code uitgevoerd
if (isset($_POST['submit'])) {
	include 'dbh.inc.php';

	//Dit zorgt voor beveiliging voor als iemand code schrijft in de sign up form en het vervolgens stuurt naar onze database.
	$uid = mysqli_real_escape_string($conn, $_POST['uid']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

	//Error handlers
	//Checkt of er lege velden zijn,
	if ( empty($uid) || empty($pwd) ) {
		header("Location: ../index.php?login=empty");
		exit();
	}
	//Nu gaan we checken of de gebruiksnaam van de gebruiker al in gebruik is in de database ofniet.
	//We gaan dus een verbinding maken met de databse en checken of er users zijn met die gebruiksnaam.
	else{
		//in deze lijn zeggen we dat alles geselecteerd moet worden van de table users waarin de user_uid (gebruiksnaam) gelijk is aan wat er ingevoerd is
		$sql = "SELECT * FROM users WHERE user_uid ='$uid' OR user_email='$uid'";

		//Nu ga ik de bovenstaande regel runnen in mijn database
		$result = mysqli_query($conn, $sql);

		//Nu wordt er gecheckt of er een resultaat heeft plaatsgevonden
		$resultCheck = mysqli_num_rows($result);

		//Nu gaan we elke keer dat er een resultaat is (dus als het aantal resultaten meer is dan 0) dan laten we een message achter
		if ($resultCheck < 1) {
			header("Location: ../index.php?login=error");
			exit();
		}
		else{
			if ($row = mysqli_fetch_assoc($result)) {
				//De wachtwoord de-hashen
				$hashedPwdCheck = password_verify($pwd, $row['user_pwd']);
				if ($hashedPwdCheck == false) {
					header("Location: ../index.php?login=error");
					exit();
				}
				elseif ($hashedPwdCheck == true) {
					//Hier logt de user in
					$_SESSION['u_id'] = $row['user_id'];
					$_SESSION['u_first'] = $row['user_first'];
					$_SESSION['u_last'] = $row['user_last'];
					$_SESSION['u_email'] = $row['user_email'];
					$_SESSION['u_uid'] = $row['user_uid'];
					header("Location: ../index.php?login=succes");
					exit();
				}
			}
		}
	}
}
else{
	header("Location: ../index.php?login=error");
	exit();
}