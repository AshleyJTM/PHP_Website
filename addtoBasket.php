<?php
session_start();
include "connection.php";

If(isset($_SESSION["username"])){
	$username = $_SESSION["username"];
}

//Get or post variable transfered

$id = $_GET['id'];
$price = $_GET['price'];

$sql = "SELECT * FROM basket WHERE prodID = " . $id . " AND username = '" . $username . "'";

$result = mysqli_query($con, $sql);

 if (!$result) {
    $message  = 'dbExec - Error thrown: ' . mysqli_error($con) . "<br/>\n";
    $message .= 'Whole query: ' . $sql;
    die($message);
  }

$count = mysqli_num_rows($result);

if($count > 0) {
	$sql="UPDATE basket SET quantity = quantity + 1 , price = price + $price WHERE prodID=$id AND username = '$username'";
	$result = mysqli_query($con, $sql);

 if (!$result) {
    $message  = 'dbExec - Error thrown: ' . mysqli_error($con) . "<br/>\n";
    $message .= 'Whole query: ' . $sql;
    die($message);
  }

}
else {
 
 $sql="INSERT INTO basket (prodID, username, quantity, price) VALUES (" . $id . ",'" . $username . "', 1 , " . $price . ")";

 // Perform Query
 $result = mysqli_query($con, $sql);

  if (!$result) {
    $message  = 'dbExec - Error thrown: ' . mysqli_error($con) . "<br/>\n";
    $message .= 'Whole query: ' . $sql;
    die($message);
  }
}
Header("Location: viewBasket.php"); 
?>