<?php
session_start();
include "connection.php";

$sql = "SELECT * FROM tbl_sofas";
$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en-gb">
	
<head>
  <title>Sofas</title>
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
echo "<table>";

$counter = 0;

if (mysqli_num_rows($result) > 0) {
	while ($row=mysqli_fetch_assoc($result))
{

   if ($counter == 3) {
     echo "</tr><tr>";
	 $counter=0;
   }
   
?>



<?php
    echo "<td><div style='text-align:center; border: 5px outset black; background-color: white; width:auto; height:auto; margin:0 auto;'>".
	"<p style='text-align:center;'>Brand: " . $row["brand"] . 
	"<br>Material: " . $row["material"] . "<br><a href=details.php?id=" . $row["id"] . ">Details</a><br/>" .
	"<br><img width='300' height='200' src='data:image/jpeg;base64,".base64_encode($row["image"]) . "'>" .
	"<br><a href=addtoBasket.php?id=" . $row["id"] . "&price=" . $row["price"] . " class=\"btn btn-primary\" >Add To Basket</a><br/>" . 
	"</div></td>";

    $counter++;
//	"<br><button type='button' onclick='addtoBasket.php'>Add to Basket</button>" .
	//"</p>" .  "<button onclick=\"window.location.href='addtoBasket.php?id=$id';\">" .

}
}
else{ 
echo "No results.";
}

?>

</tr>
<tr>
</table>
  
  <!-- Footer -->
  <footer class="bold" style="bottom:0; position:fixed;">
    Email: SofasRUs@gmail.co.uk ----- Phone: 07746276488
  </footer>
</body>

</html>
