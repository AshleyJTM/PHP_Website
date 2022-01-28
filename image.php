<?php
include "connection.php";
$sql = "SELECT * FROM tbl_sofas";
$result = mysqli_query($con, $sql);
while($row = mysqli_fetch_assoc($result))
{
	echo "<p>Name: " . $row["image"] .     
	"<br>Image: <img src=getImage.php?ID=" . $row["image"] . " width=100, height=100>";
}