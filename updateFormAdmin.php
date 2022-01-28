<?php
session_start();
include "connection.php";


if(isset($_SESSION["username"]) ){
	$username = $_SESSION["username"];
}
?>

<!DOCTYPE html>
<html lang="en-gb">

<head>
  <title>Update Details</title>
  <meta charset="UTF-8">
  <meta name="description" content="SofasRUs">
  <meta name="author" content="Ashley Tanner-Mortell">
  <meta name="viewport" content="width=device-width, inital=scale=1">
  <link rel="stylesheet" href="stylesheet.css">
</head>

<body style='text-align:center;'>
  <div class="head">
    <h1 style="text-align:center;">SOFAS R US</h1>
  </div>

  <!-- Navigation Bar -->
  <ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="sofas.php">Sofas</a></li>
	<li><a href="viewBasket.php">Basket</a></li>

<?php

if(isset($_SESSION["username"]) ){

  if($_SESSION["level"]=="admin"){
	echo "<li><a class='active' href='adminpage.php'>Admin</a></li>\n";
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
$id=$_REQUEST["ID"];
$sql = "SELECT * FROM login WHERE id = '$id'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
?>

<br><div style='text-align:center; border: 5px outset black; background-color: white; width:500px; margin:0 auto;'>
<br><h1>Update Admin Details</h1>
<p> Change details here.</p>
<form action="updateAdmin.php" method="post">ID: <input type="text" name="id" value=<?php echo $row["ID"]; ?> readonly><p> 

Username: <input type="text" name="username" value=<?php echo $row["username"]; ?>><p>

Password: <input type="text" name="pass" value=<?php echo $row["pass"]; ?>><p>

User Level: <input type="text" name="level" value=<?php echo $row["level"]; ?>><p>

<input type="submit">
</form>
</div>
<!-- Footer -->
  <footer class="bold" style="bottom:0; position:fixed;">
    Email: SofasRUs@gmail.co.uk ----- Phone: 07746276488
  </footer>
</body>

</html>