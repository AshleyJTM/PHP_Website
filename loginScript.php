<?php
session_start();
include "connection.php";

if(isset($_POST["username"])){
	$username = $_POST["username"];
}

if(isset($_POST["password"])){
	$password = $_POST["password"];
}

$sql = "SELECT * FROM login WHERE username = '$username' and pass = '$password'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

if(mysqli_num_rows($result) == 1){
$_SESSION["username"]=$username;
$_SESSION["level"]=$row["level"];

if($_SESSION["level"]=="admin"){
	header("Location: index.php");
}
else{
	header("Location: index.php");
}
}
else{
	echo "<script type='text/javascript'>alert('Test');</script>";
	header("Location: loginPage.php");
}
?>