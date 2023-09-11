<?php 
$servername = "localhost";
$username = "root";
$password = "Donjet123@";
$dbname = "suggestion";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


?>





</tbody>
</table>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dashboard.css">
    <title>Document</title>

</head>
<body>
    <header class="header">
        <h3 class="logo"> <img src="Logo.jpg"></h3>
        <nav class="navbar">
          <ul class="navbar-list">
            <li><a class="navbar-link" href="createMovie.php">Insert Movie</a></li>
            <li><a class="navbar-link" href="login.php">Log Out</a></li>
            
          </ul>
        </nav>
  </header>

    <table class="styled-table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Last Name</th>
            <th>Country</th>
            <th>Image</th>
            <th>Subject</th>

        </tr>
    </thead>
    <tbody>
        <tr class="active-row"></tr>
        <?php
      $sql = "SELECT * FROM suggest";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            
          echo "<tr>";
          echo "<td>" . $row["name"] . "</td>";
          echo "<td>" . $row["lastname"] . "</td>";
          echo "<td>" . $row["country"] . "</td>";
          echo '<td >
          <img  width="50px" height="50px" src="photos/' . $row["image_path"] . '">
      </td>';
          echo "<td>" . $row["subject"] . "</td>";
          echo "</tr>";
        }
        
       } else {
      echo "<tr><td colspan='4'>No results found</td></tr>";
       }
      
      $conn->close();
    ?>
    </tbody>
</table>
      
<footer>
    <div class="footer">
        <div class="row">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
            <a href="#"><i class="fa fa-youtube"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
        </div>

        <div class="row">
            <ul>
                <li><a href="#">Contact us</a></li>
                <li><a href="#">Our Services</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Terms & Conditions</a></li>
                <li><a href="#">Career</a></li>
            </ul>
        </div>

        <div class="row">
            MyMovies OFFICIAL Copyright © 2023, PRISTINA-KOSOVO - All rights reserved.
        </div>
    </div>
</footer>

</body>
</html>