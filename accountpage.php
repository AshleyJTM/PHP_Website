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
  <title>Account Details</title>
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
	<li><a href="viewBasket.php">Basket</a></li>

<?php

if(isset($_SESSION["username"]) ){

  if($_SESSION["level"]=="admin"){

	echo "<li><a href='adminpage.php'>Admin</a></li>\n";
  }
  
  echo "<li><a class='active' href='accountpage.php'>Account</a></li>\n";
  echo "<li><a href='logout.php'>Log Out</a></li></ul>\n";
} 
else {
    echo "<li><a href='register.php'>Register</a></li>\n";
}
?>
  </ul>
<?php
$sql = "SELECT * FROM login where username = '$username';";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
	while ($row=mysqli_fetch_assoc($result))
{
	echo "<br><div style='text-align:center; border: 5px outset black; background-color: white; width:500px; margin:0 auto;'>".
	"<br><h1>Account Details</h1>".
	"<p> Your account details, press update to change username and password.</p>".
	"<p>Username: " . $row["username"] . 
	"<br>Password: " . $row["pass"] .
	"<br><br><a href=updateForm.php?ID=" . $row["ID"] . ">Update</a>"  .
	"</p>";
	"</div>";
	
}
}
else{ 
echo "No results.";
}
?>
  <!-- Footer -->
  <footer class="bold" style="bottom:0; position:fixed;">
    Email: SofasRUs@gmail.co.uk ----- Phone: 07746276488
  </footer>
</body>

</html>
