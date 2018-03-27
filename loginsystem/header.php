<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>loginsystem</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>

<header>
	<nav>
		<div class="main-wrapper">
			<ul>
				<li><a href="index.php">Home</a></li>
			</ul>
			<div class="nav-login">
				<?php  
					if (isset($_SESSION['u_id'])) {
						echo '<form action="includes/logout.inc.php" method="POST">
									<button type="submit" name="submit">Log out</button>
							  </form>';
					}
					else {
						echo '<form action="includes/login.inc.php" method="POST">
								<input type="text" name="uid" placeholder="username/email">
								<input type="password" name="pwd" placeholder="password">
								<button type="submit" name="submit">Login</button>
							  </form>
							  <a href="signup.php">Sign up!</a>';
					}
				?>
			</div>
		</div>
	</nav>
</header>