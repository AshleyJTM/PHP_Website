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
  <title>Login Page</title>
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
	<li><a class="active" href="register.php">Register</a></li>

<?php

if(isset($_SESSION["username"]) ){

  if($_SESSION["level"]=="admin"){

	echo "<li><a href='adminpage.php'>Admin</a></li>\n";
  }
  
  echo "<li><a href='accountpage.php'>Account</a></li>\n";
  echo "<li><a href='logout.php'>Log Out</a></li>\n";
}
?>
</ul>
  <!-- Forms -->
  <form  action="loginScript.php" method="post" onsubmit="return validate();">
    <div class="containerform">
    <h1>Login Page</h1>
    <p>Please fill in this form to create an account to save your shopping.</p>
    <hr>
	<div style='text-align:center; border: 5px outset black; background-color: white; width:400px; height:auto; margin:0 auto;'>
	<br>Username: <input type="text" name="username" id="username"><p>
	Password: <input type="password" name="password" id="password"><p>
	<input type="submit">
	<br><br><a href="register.php">If you do not have an account. Click here.</a>
	</div>
    </div>
</form>

<!-- Validation -->
<script>
  function validate() {
    var value = document.getElementById('username').value;
    if (value.length < 6) {
      alert('Username needs to be above 6 characters.')
      return false;
    }
    var value = document.getElementById('password').value;
    if (value.length < 6) {
      alert('Password needs to be above 6 characters.')
      return false;
    }
}
    alert('Account Created!')
    return true;
  }
</script>

    <!-- Footer -->
    <footer class="bold" style="bottom:0; position:fixed;">
    Email: SofasRUs@gmail.co.uk ----- Phone: 07746276488
  </footer>
</body>

</html>
