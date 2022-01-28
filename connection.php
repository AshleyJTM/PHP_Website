 <?php
 $host = "localhost"; 
 $username = "n0878275";
 $pass = "13LxgOCZ";
 $db = "m_soft20171_n0878275";
 
 $con = mysqli_connect($host, $username, $pass, $db);
 
  if (mysqli_connect_errno())
  {
	  echo "Failed to connect.";
	  mysqli_connect_error();
  }
 ?>