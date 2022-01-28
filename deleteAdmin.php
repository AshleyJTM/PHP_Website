<?php
session_start();
include "connection.php";

$id = $_GET['ID'];
$username = $_GET['username'];


$sql = "DELETE FROM login WHERE ID = $id and username = '$username'";

echo "SQL: $sql";

$result = mysqli_query($con, $sql);

 if (!$result) {
    $message  = 'dbExec - Error thrown: ' . mysqli_error($con) . "<br/>\n";
    $message .= 'Whole query: ' . $sql;
    die($message);
 } else {
    echo "Account Deleted<BR>";
  }

Header("Location: adminpage.php"); 
?>