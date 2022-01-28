<?php
session_start();
include "connection.php";

If(isset($_SESSION["username"])){
	$username = $_SESSION["username"];
}

$id = $_GET['id'];

$sql = "DELETE FROM basket WHERE prodid = $id and username = '$username'";

$result = mysqli_query($con, $sql);

 if (!$result) {
    $message  = 'dbExec - Error thrown: ' . mysqli_error($con) . "<br/>\n";
    $message .= 'Whole query: ' . $sql;
    die($message);
 } else {
    echo "Basket Deleted<BR>";
  }

Header("Location: viewBasket.php"); 
?>