<?php
  session_start();

  if (!isset($_SESSION['logged_in'])) {
    header('Location: index.php');
    exit();
  }

  $iban = $_GET['iban'];
  $receiver = $_GET['receiver'];
  $amount = $_GET['amount'];

  require_once "connection.php";

	$connection = @new mysqli($host, $db_user, $db_password, $db_name);

  $connection->query(
  sprintf("INSERT INTO `transfers` (`iban`, `receiver`, `amount`, `user_id`) VALUES ('%s', '%s', %f, %f)",
  mysqli_real_escape_string($connection,$iban),
  mysqli_real_escape_string($connection,$receiver),
  mysqli_real_escape_string($connection,$amount),
  mysqli_real_escape_string($connection,$_SESSION['id'])
  ));

  header('Location: index.php');
?>
