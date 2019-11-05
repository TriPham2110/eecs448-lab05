<!--Reference https://www.php.net/manual/en/function.empty.php-->
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

  if(empty($post)){
    echo "Post needs to have text";
  }
  else{
    $query = "SELECT user_id FROM Users WHERE user_id='$username'";
    if($result = $mysqli->query($query)){
      if($row = $result->fetch_assoc()){
        $insert = "INSERT INTO Posts (content,author_id) VALUES ('$post','$username')";
        $mysqli->query($insert);
        echo "The post was saved successfully <br>";
      }
      else{
        echo "The post was not written by an existing user <br>";
      }
    }
    $result->free();
  }

  echo "<form action='https://people.eecs.ku.edu/~v473p289/eecs448-lab05/AdminHome.html'>";
  echo "<input type='submit' value='Go to AdminHome' style='font-weight: bold; color: white; background-color: black; cursor: default;'/>";
  echo "</form>";
  $mysqli->close();
?>
