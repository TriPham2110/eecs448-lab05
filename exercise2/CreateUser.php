<!-- https://www.php.net/manual/en/function.empty.php -->
<?php
  error_reporting(E_ALL);
  ini_set("display_errors", 1);

  $mysqli = new mysqli("mysql.eecs.ku.edu", "thientri399", "Utiew3Un", "thientri399");

  $username = $_POST["username"];

  if($mysqli->connect_error){
    printf("Connection failed: " . $mysqli->connect_error);
    exit();
  }

  if(empty($username)){
    echo "Username needs to be at least length 1";
  }

  else{
    $insert = "INSERT INTO Users (user_id) VALUES ('$username')";
    if($mysqli->query($insert)){
      echo "Username successfully stored";
      echo "<br>";
    }
    else {
      echo "Username already exists";
      echo "<br>";
    }
  }

  echo "<form action='https://people.eecs.ku.edu/~v473p289/eecs448-lab05/AdminHome.html'>";
  echo "<input type='submit' value='Go to AdminHome' style='font-weight: bold; color: white; background-color: black; cursor: default;'/>";
  echo "</form>";
  $mysqli->close();
?>
