<!--https://www.w3schools.com/php/php_mysql_connect.asp-->
<?php
  error_reporting(E_ALL);
  ini_set("display_errors", 1);

  $mysqli = new mysqli("mysql.eecs.ku.edu", "thientri399", "Utiew3Un", "thientri399");

  $username = $_POST["username"];

  if($mysqli->connect_error){
    printf("Connection failed: " . $mysqli->connect_error);
    exit();
  }

  $insert = "INSERT INTO Users (user_id) VALUES ('$username')";

  if($mysqli->query($insert)){
    echo "Username successfully stored";
    echo "<br>";
  }
  else {
    echo "Username already exists";
    echo "<br>";
  }

  echo "Connected successfully";
  $mysqli->close();
?>
