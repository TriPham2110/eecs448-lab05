<?php
  error_reporting(E_ALL);
  ini_set("display_errors", 1);

  $username = $_POST['userID'];

  $mysqli = new mysqli("mysql.eecs.ku.edu", "thientri399", "Utiew3Un", "thientri399");

  if($mysqli->connect_error){
    printf("Connection failed: " . $mysqli->connect_error);
    exit();
  }

  echo "<table border=1 width=25% style='margin: 0px auto; margin-top: 150px; text-align: center; background-color: #939393;'>";
  echo "<tr>";
  echo "<th colspan=3>Posts info fetched from database for user $username</th>";
  echo "</tr>";

  $query = "SELECT content FROM Posts WHERE author_id = '$username'";

  if($result = $mysqli->query($query)){
    while ($row = $result->fetch_assoc()){
      echo "<tr>";
      echo "<th style= 'background-color: #e0e0e0;'>" . $row["content"] . "</th>";
      echo "</tr>";
    }
    $result->free();
  }
  echo "</table>";
  echo "<form action='https://people.eecs.ku.edu/~v473p289/eecs448-lab05/AdminHome.html' style='text-align: center'>";
  echo "<input type='submit' value='Go to AdminHome' style='font-weight: bold; color: white; background-color: black; cursor: default;'/>";
  echo "</form>";
  $mysqli->close();
 ?>
