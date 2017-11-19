<?php
	session_start();

	if (!isset($_SESSION['logged_in'])) {
		header('Location: index.php');
		exit();
	}
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Super Bank - New transfer</title>
</head>

<body>

<form action="confirm_transfer.php" method="post">
	IBAN: </br> <input id="iban" type="text" name="iban" /> <br />
	Receiver: </br> <input id="name" type="text" name="receiver" /> <br />
	Amount: </br> <input id="amount" type="text" name="amount" /> <br /><br />
	<input id="submit" type="submit" value="Make transfer" />
</form>

</body>
</html>
