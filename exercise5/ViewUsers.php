<?php
  error_reporting(E_ALL);
  ini_set("display_errors", 1);

  $mysqli = new mysqli("mysql.eecs.ku.edu", "thientri399", "Utiew3Un", "thientri399");

  if($mysqli->connect_error){
    printf("Connection failed: " . $mysqli->connect_error);
    exit();
  }

  echo "<table border=1 width=20% style='margin: 0px auto; margin-top: 150px; text-align: center; background-color: #939393;'>";
  echo "<tr>";
  echo "<th>Usernames fetched from database</th>";
  echo "</tr>";

  $query = "SELECT user_id FROM Users";

  if($result = $mysqli->query($query)){
    while ($row = $result->fetch_assoc()){
      echo "<tr>";
      echo "<th style= 'background-color: #e0e0e0;'>" . $row["user_id"] . "</th>";
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
