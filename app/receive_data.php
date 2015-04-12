<?php 
  require('includes/config.php'); 
  $newBid = $_REQUEST["message"];
  $matric = $_REQUEST["matric"];
  $code = $_REQUEST["code"];

  // Create connection
  $conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
  // Check connection
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }  



  $sql = "UPDATE bid SET bidPoint='". $newBid ."' WHERE matric='". $matric ."' AND module_code='".$code."'";
  
  if ($conn->query($sql) === TRUE) {
      echo $sql;
  } else {
      echo "Error updating record: " . $conn->error;
  }

  mysqli_close($conn);

?>

