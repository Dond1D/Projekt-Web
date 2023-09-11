<?php 

$servername = "localhost";
$username = "root";
$password = "Donjet123@";
$dbname = "suggestion";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

session_start();
if(!empty($_SESSION['user_id'])) {
  header("Location: /");
}

if (isset($_POST['submit']) && isset($_FILES['image'])) {
  // var_dump($_FILES);

  $name = $_POST['name'];
  $lastname = $_POST['lastname'];
  $country = $_POST['country'];
  $subject = $_POST['subject'];
  $img_name = $_FILES['image']['name'];
  $img_size = $_FILES['image']['size'];
  $tmp_name = $_FILES['image']['tmp_name'];
  $error = $_FILES['image']['error'];

  if ($error === 0) {
    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
    $img_ex_lc = strtolower($img_ex);
    $allowed_exs = array("jpg", "jpeg", "png");

    if (in_array($img_ex_lc, $allowed_exs)) {
      $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
      $img_upload_path = 'photos/' . $new_img_name;
      move_uploaded_file($tmp_name, $img_upload_path);

      // Insert into Database using prepared statements
      $stmt = $conn->prepare("INSERT INTO suggest(name, lastname, country, image_path, subject) VALUES(?,?,?,?,?)");
      $stmt->bind_param("sssss",$name,$lastname,$country,$new_img_name,$subject);
      $stmt->execute();
      $stmt->close();
      $conn->close();
    } else {
      $em = "You can't upload files of this type";
      header("Location: index.php?error=$em");
    }
  } else {
    $em = "unknown error occurred!";
    
    header("Location: index.php?error=$em");
  }
  
  echo "<script>alert('Successfully created') </script>";
  header("Location: AboutUs.php");
  exit(); // to prevent further execution
}


