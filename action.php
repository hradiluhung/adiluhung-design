<?php
session_start();
include 'connection.php';
$username = $_POST['username'];
$password = $_POST['password'];

$stmt = mysqli_prepare($conn, "SELECT * FROM user WHERE username = ? AND password = ?");
mysqli_stmt_bind_param($stmt, "ss", $username, $password);
mysqli_stmt_execute($stmt);
$hasil = mysqli_stmt_get_result($stmt);
$loggedIn = mysqli_fetch_array($hasil);

if($loggedIn){
  header("Location: index.php");
  $_SESSION['name'] = $loggedIn['username'];
}else {
  header("Location: login.php");
}
?>