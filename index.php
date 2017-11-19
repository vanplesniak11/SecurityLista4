<?php
	session_start();

	if((isset($_SESSION['logged_in'])) && ($_SESSION['logged_in'] == true)){
		header('Location: user_panel.php');
		exit();
	}
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Super Bank</title>
</head>

<body>
<p>Super Bank</p>

<a href="register.php">Register now!</a>
<br /><br />

<form action="login.php" method="post">
	Login: </br> <input type="text" name="login" /> <br />
	Hasło: </br> <input type="password" name="password" /> <br /><br />
	<input type="submit" value="Zaloguj" />
</form>

<?php
	if(isset($_SESSION['error']))	echo $_SESSION['error'];
?>

</body>
</html>
