<?php
session_start();
include "connection.php";

if(isset($_POST["id"])){
	$id = $_POST["id"];
}
if(isset($_POST["username"])){
	$username = $_POST["username"];
}
if(isset($_POST["pass"])){
	$pass = $_POST["pass"];
}

if(isset($_POST["level"])){
	$level = $_POST["level"];
}

$sql = "UPDATE login SET username='$username', pass='$pass', level='$level' WHERE ID = '$id'";
  
if(mysqli_query($con, $sql)){
	header("Location: adminpage.php");
	echo "doing";
}
else{
	echo mysqli_error($con);
    $message  = 'dbExec - Error thrown: ' . mysqli_error($con) . "<br/>\n";
    $message .= 'Whole query: ' . $sql;
    die($message);
}
?>