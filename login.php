<?php
  session_start();

  if ((!isset($_POST['login'])) || (!isset($_POST['password']))) {
    header('Location: index.php');
    exit();
  }

  require_once "connection.php";

  $login = $_POST['login'];
  $password = $_POST['password'];

  $connection = @new mysqli($host, $db_user, $db_password, $db_name);

	if ($connection->connect_errno!=0) {
		echo "Error: ".$connection->connect_errno;
	}
	else {
		$login = $_POST['login'];
		$password = $_POST['password'];

		$login = htmlentities($login, ENT_QUOTES, "UTF-8");
		$password = htmlentities($password, ENT_QUOTES, "UTF-8");

		if ($result = @$connection->query(
		sprintf("SELECT * FROM users WHERE user='%s'",
		mysqli_real_escape_string($connection,$login)))) {
			$user_count = $result->num_rows;

			if($user_count > 0) {
				$row = $result->fetch_assoc();

				if(password_verify($password, $row['pass'])) {
					$_SESSION['id'] = $row['id'];
					$_SESSION['user'] = $row['user'];

					$_SESSION['logged_in'] = true;

					unset($_SESSION['error']);
					$result->free_result();
					header('Location: user_panel.php');
				} else {
					$_SESSION['error'] = '<span style="color:red">Wrong login or password!</span>';
					header('Location: index.php');
				}
			} else {
				$_SESSION['error'] = '<span style="color:red">Wrong login or password!</span>';
				header('Location: index.php');
			}
		}
		$connection->close();
	}
?>
