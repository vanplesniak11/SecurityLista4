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
	<title>Super Bank - Confirm transfer</title>
</head>

<body>

<form action="save_data.php" method="get">
	IBAN: </br> <input id="iban" type="text" value="<?php echo $_POST['iban']; ?>" name="iban" readonly /> <br />
	Receiver: </br> <input id="receiver" type="text" value="<?php echo $_POST['receiver']; ?>" name="receiver" readonly/> <br />
	Amount: </br> <input id="amount" type="text" value="<?php echo $_POST['amount']; ?>" name="amount" readonly/> <br /><br />
	<input id="submit" type="submit" value="Confirm" />
</form>

</body>
</html>
