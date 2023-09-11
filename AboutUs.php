<?php $servername = "localhost";
$username = "root";
$password = "Donjet123@";
$dbname = "filmat";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



?>





<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="about.css">
  <title>Home</title>
</head>

<body>

  <div class="search-container">
    <form>
      <input type="text" placeholder="Search for any movie">
      <button type="submit">Search</button>
    </form>
  </div>


  <div class="side-menu">

    <div class="dropdown">
      <button class="dropdown-btn">Genres</button>
      <div class="dropdown-content">
        <a href="#">Action</a>
        <a href="#">Comedy</a>
        <a href="#">Thriller</a>
        <a href="#">Drama</a>
        <a href="#">Horror</a>
      </div>
    </div>

    <nav>
      <ul>
        <li><a href="AboutUs.php">Home</a></li>
        <li><a href="#">Series</a></li>
        <li><a href="index.php">About us</a></li>
        <li><a href="suggestion.php">Suggestion</a></li>
        <li><a href="login.php">Sign out</a></li>
      </ul>
    </nav>
  </div>

  <button id="toggle-menu" class="toggle"><img src="Logo.jpg" width="5px"></button>


  </div>

  <div class="slideshow-container">
    <h2>Comming Soon . . .</h2>
    <div class="slides">
      <img src="material/headerslider/creed-iii-poster.webp" alt="Image 1">
      <img src="material/headerslider/indiana-jones-5-1.webp" alt="Image 2">
      <img src="material/headerslider/John-Wick-Chapter-4-trailer.webp" alt="Image 3">
      <img src="material/headerslider/Oppenheimerheader.webp" alt="Image 4">
      <img src="material/headerslider/scream-6-map-header.webp" alt="Image 5">
      <img src="material/headerslider/the-idol-pic.webp" alt="Image 6">
      <img src="material/headerslider/xfastx.jpg" alt="Image 7">
    </div>
  </div>

  <div class="photo-grid">
    <div class="flip-card">
      <div class="flip-card-inner">
        <div class="flip-card-front">
          <img src="photos/avatar.jpg" alt="photo1">
          <h2>Avatar</h2>
        </div>
        <div class="flip-card-back">
          <p>When MIT Media Lab researcher Joy Buolamwini discovers that facial recognition does not see dark-skinned
            faces accurately, she embarks on a journey to push for the first-ever U.S..</p>
          <div id="toolbar">
            <button id="save-button">Save</button>
            <a href="https://tinyurl.com/ydpznsaz" class="play-button">
              Play
            </a>
          </div>
        </div>
      </div>
    </div>




    <?php
      $sql = "SELECT * FROM adminfilm";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            
          echo '<div class="flip-card">
          <div class="flip-card-inner">
            <div class="flip-card-front">
              <img src="photos/'. $row["image_path"] .' ">
              <h2>'.$row["emri"].'</h2>
            </div>
            <div class="flip-card-back">
              <p>'.$row["description"].'</p>
              <div id="toolbar">
                <button id="save-button">Save</button>
                <a href="https://tinyurl.com/ydpznsaz" class="play-button">
                 Play
                </a>
              </div>
            </div>
          </div>
        </div>';
        }
      } 
      if (!$result) {
        die("Error in SQL query: " . $conn->error);
      }
      

      $conn->close();
    ?>

  </div>
  <div class="pagination">
    <a href="#">&laquo;</a>
    <a href="#">1</a>
    <a href="#">2</a>
    <a href="#">3</a>
    <a href="#">4</a>
    <a href="#">5</a>
    <a href="#">&raquo;</a>
  </div>


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
        MyMovies OFFICIAL Copyright © 2023 , KOSOVO - All rights reserved.
      </div>
    </div>
  </footer>



</body>
<script src="au.js"></script>

</html>



