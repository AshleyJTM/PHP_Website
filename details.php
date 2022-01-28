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
  <title>Details</title>
  <meta charset="UTF-8">
  <meta name="description" content="SofasRUs">
  <meta name="author" content="Ashley Tanner-Mortell">
  <meta name="viewport" content="width=device-width, inital=scale=1">
  <link rel="stylesheet" href="stylesheet.css">
</head>

<body style="text-align:center;">
  <div class="head">
    <h1 style="text-align:center;">SOFAS R US</h1>
  </div>

  <!-- Navigation Bar -->
  <ul>
    <li><a href="index.php">Home</a></li>
    <li><a class="active" href="sofas.php">Sofas</a></li>
	<li><a href="viewBasket.php">Basket</a></li>

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

$id = $_GET['id'];

$sql = sprintf("SELECT * FROM tbl_sofas where id = ('%s')", mysqli_real_escape_string($con, $id ) );

$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
	while ($row=mysqli_fetch_assoc($result)) {

    echo "<td><div>".
	"<br><div style='text-align:center; border: 5px outset black; background-color: white; width:400px; height:auto; margin:0 auto;'" .
	"<p>Brand: " . $row["brand"] . 
	"<br>Material: " . $row["material"] .
	"<br>Color: " . $row["color"] .
	"<br>Price: £" . $row["price"] .
	"</p>" . "</div>" .
	"<br><img width=800 height=500 src='data:image/jpeg;base64,".base64_encode($row["image"]) . "'>" .
	"<br><br><div style='text-align:center; border: 5px outset black; background-color: white; width:1000px; height:auto; margin:0 auto;'" .
	"<p><br><br>Description: " . $row["description"] .
	"</p>". "</div>" .
	"</div></td>";
	}
}

?>
  
  <!-- Footer -->
  <footer class="bold" style="bottom:0; position:fixed;">
    Email: SofasRUs@gmail.co.uk ----- Phone: 07746276488
  </footer>
</body>

</html>
