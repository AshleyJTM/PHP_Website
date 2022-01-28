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
  <title>Basket</title>
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
//Get or post variable transfered

//Gets data from database instead of having to use foreign keys
$sql = "SELECT b.prodid, b.username, b.quantity, p.brand, p.material, p.color , p.price FROM tbl_sofas p
JOIN basket b ON p.ID = b.prodid WHERE b.username = '$username'";

$result = mysqli_query($con, $sql);

 if (!$result) {
    $message  = 'dbExec - Error thrown: ' . mysqli_error($con) . "<br/>\n";
    $message .= 'Whole query: ' . $sql;
    die($message);
  }

$totQty = 0;
$total = 0;
echo"<br><div style='text-align:center; border: 5px outset black; background-color: white; width:900px; height:auto; margin:0 auto;'>";
echo "<br><table>";
  echo "<tr><th>Brand</th><th>Material</th><th>Quantity</th><th>Colour</th><th>Price</th></tr>";

while($row = mysqli_fetch_assoc($result)){
	//echo $row["username"] . "<br>";
  echo "<tr><td>" . $row["brand"] . "</td><td>" . $row["material"] . "</td><td>" . $row["quantity"] . "</td><td>" . $row["color"] . 
	"</td><td>" . $row["price"] . "</td><td><a href=deleteBasket.php?id=" . $row["prodid"] . ">Delete</a></td></tr>";

	$price = $row["price"];
	$quantity = $row["quantity"];
	$prodTotal = $price*$quantity;
	$total += $prodTotal;
	$totQty += $quantity;
} 

echo "</table>";
echo "<p style='text-align:center;'><br>Your Total Quantity is: " . $totQty . "<br>\n" .
"<br>Your total is: " . $total . "</br>\n" .
"<br> <a style='align:center;' href='confirm.php'>Click  here to confirm payment!</a>" .
"<br><br><br> <a style='align:center;' href='sofas.php'>Return to Products</a>" .
"</p>";
echo"</div>";

?>

