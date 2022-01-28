<?php
include "connection.php";

if(isset($_POST["username"])){
	$username = $_POST["username"];
}

if(isset($_POST["password"])){
	$password = $_POST["password"];
}

$sql = "INSERT INTO login (username, pass) VALUES ('$username', '$password')";

if(mysqli_query($con, $sql)){
	header("Location: loginPage.php");
}
else{
	echo "Error";
}
?>