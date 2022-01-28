<?php
session_start();
include "connection.php";

If(isset($_SESSION["username"])){
	$username = $_SESSION["username"];
}
?>

<!DOCTYPE html>
<html lang="en-gb">
	
<head>
  <title>Order Complete</title>
  <meta charset="UTF-8">
  <meta name="description" content="SofasRUs">
  <meta name="author" content="Ashley Tanner-Mortell">
  <meta name="viewport" content="width=device-width, inital=scale=1">
  <link rel="stylesheet" href="stylesheet.css">
</head>

<body>
  <div class="head">
    <h1 style="text-align:center;">SOFAS R US</h1>
  </div>

  <!-- Navigation Bar -->
  <ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="sofas.php">Sofas</a></li>
	<li><a class="active" href="viewBasket.php">Basket</a></li>

<?php

if(isset($_SESSION["username"]) ){

  if($_SESSION["level"]=="admin"){

	echo "<li><a href='adminpage.php'>Admin</a></li>\n";
  }
  
  echo "<li><a href='accountpage.php'>Account</a></li>\n";
  echo "<li><a href='logout.php'>Log Out</a></li></ul>\n";
} 
else {
    echo "<li><a href='register.php'>Register</a></li>\n";
}
?>
</ul>
<?php

$sql = "DELETE FROM basket WHERE username = '$username'";

//echo $sql;

$result = mysqli_query($con, $sql);

 if (!$result) {
    $message  = 'dbExec - Error thrown: ' . mysqli_error($con) . "<br/>\n";
    $message .= 'Whole query: ' . $sql;
    die($message);
 } else {
	echo"<br><div style='text-align:center; border: 5px outset black; background-color: white; width:900px; height:auto; margin:0 auto;'>";
   echo "<p style='text-align:center;'>Order Complete<br/>" .
   "<br><a href='index.php'>Click here to return to main menu!</a>";
   echo"</div>";
 }
?>