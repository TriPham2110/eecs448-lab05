<!--Reference https://wiki.ittc.ku.edu/ittc_wiki/index.php/EECS448:Lab5-->
<?php
  error_reporting(E_ALL);
  ini_set("display_errors", 1);

  $mysqli = new mysqli("mysql.eecs.ku.edu", "thientri399", "Utiew3Un", "thientri399");

  $username = $_POST["username"];
  $post = $_POST["post"];
  $userExists = true;

  if($mysqli->connect_error){
    printf("Connection failed: " . $mysqli->connect_error);
    exit();
  }

  $query = "SELECT user_id FROM Users";

  if($result = $mysqli->query($query)){
    while ($row = $result->fetch_assoc()){
      if($username != $row["user_id"]){
        $userExists = false;
      }
      else{
        $insert = "INSERT INTO Posts (content,author_id) VALUES ('$post','$username')";
        $mysqli->query($insert);
        $userExists = true;
      }
    }
    $result->free();
  }

  if(!$userExists){
    echo "The post was not written by an existing user <br>";
  }
  else{
    echo "The post was saved successfully <br>";
  }

  echo "Connected successfully";
  $mysqli->close();
?>
