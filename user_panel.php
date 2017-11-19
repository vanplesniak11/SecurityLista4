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
	<title>Super Bank - Control panel</title>
</head>

<body>

<?php
	echo "<p>Hello ".$_SESSION['user'].'! [ <a href="transfer.php">New Transfer</a> ] [ <a href="logout.php">Logout!</a> ]</p>';

	require_once "connection.php";

	$connection = @new mysqli($host, $db_user, $db_password, $db_name);

	if ($connection->connect_errno!=0) {
		$_SESSION['error'] = '<span style="color:red">Unable to connect!</span>';
		header('Location: index.php');
		exit();
	}
	else {
		$query = "SELECT * FROM transfers WHERE user_id=".$_SESSION['id'];
		$result = $connection->query($query);


		echo "<table>";
		echo "<tr>";
		echo "<td>IBAN</td>";
		echo "<td>Receiver</td>";
		echo "<td>Amount</td>";
		echo "</tr>";

		while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
		 echo "<tr>";
		 echo "<td class='iban'>".$row['iban']."</td>";
		 echo "<td class='receiver'>".$row['receiver']."</td>";
		 echo "<td class='amount'>".$row['amount']."</td>";
		 echo "</tr>";
 }

		echo "</table>";
	}

?>



</body>
</html>
