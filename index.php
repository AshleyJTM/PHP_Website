<?php
session_start();
include "connection.php";

if(isset($_SESSION["username"]) ){
$username = $_SESSION["username"];
}

$sql = "SELECT * FROM login WHERE username = '$username'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

if(mysqli_num_rows($result) == 1){
$_SESSION["level"]=$row["level"];
}

?>
<!DOCTYPE html>
<html lang="en-gb">

<head>
  <title>Home</title>
  <meta charset="UTF-8">
  <meta name="description" content="SofasRUs">
  <meta name="author" content="Ashley Tanner-Mortell">
  <meta name="viewport" content="width=device-width, inital=scale=1">
  <link rel="stylesheet" href="stylesheet.css">
  <script src="slideshow.js"></script>
</head>

<body>
  <div class="head">
    <h1 style="text-align:center;">SOFAS R US</h1>
  </div>

  <!-- Navigation Bar -->
  <ul>
    <li><a class="active" href="index.php">Home</a></li>
    <li><a href="sofas.php">Sofas</a></li>
	<li><a href="viewBasket.php">Basket</a></li>

<?php

if(isset($_SESSION["username"]) ){

  if($_SESSION["level"]=="admin"){

	echo "<li><a href='adminpage.php'>Admin</a></li>\n";
  }
  
  echo "<li><a href='accountpage.php'>Account</a></li>\n";
  echo "<li><a href='logout.php'>Log Out</a></li></ul>\n";
} else {
    echo "<li><a href='register.php'>Register</a></li>\n";
}
?>
  </ul>
  
  <!-- Slideshow -->
  <div class="slideshow-container">
    <div class="mySlides fade">
      <img src="images/sofas1.jpg" style="width:100%; height:400px; object-fit:cover;">
    </div>
    <div class="mySlides fade">
      <img src="images/sofas2.jpg" style="width:100%; height:400px; object-fit:cover;">
    </div>
    <div class="mySlides fade">
      <img src="images/sofas3.jpg" style="width:100%; height:400px; object-fit:cover;">
    </div>
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
  </div>
  <br>
  <br>

  <!-- About us -->
  <div class="centered">
    <div class="about">
      <h2 class="bold">About Us</h2>
      <p>Hello we are Sofas R Us we provide the best quality sofas in
        the whole of the united kingdom, we provide a 3 year warranty on all
        of our sofas. If you have and questions, issues or would like to inquire
        about a perticular sofa then please contact us with our details below.</p>
      <p class="bold">Ratings:</p>
      <p> Guardian: 5/5 -- Forbes 9/10 </p>
    </div>
  </div>

  <!-- Footer -->
  <footer class="bold" style="bottom:0; position:fixed;">
    Email: SofasRUs@gmail.co.uk ----- Phone: 07746276488
  </footer>

  <!-- Ensures slide image loads -->
  <script>
    showSlides(slideIndex);
  </script>
</body>

</html>
