<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Create a new mysqli instance
    $conn = new mysqli("localhost", "root", "Donjet123@", "filmat");

    // Check for connection errors
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the form was submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Get the form data
        $emri = $_POST['emri'];
        $image_path = $_POST['image_path'];
        $description = $_POST['description'];
        $message = '';

        // Prepare the SQL statement with placeholders for input parameters
        $sql = "UPDATE adminfilm SET emri=?, image_path=?, description=? WHERE id=?";
        $stmt = $conn->prepare($sql);

        // Bind the input parameters to the placeholders
        $stmt->bind_param("sssi", $emri, $image_path, $description, $id);

        // Execute the query
        if ($stmt->execute()) {
            echo "Record updated successfully.";
        } else {
            echo "Error updating record: " . $conn->error;
        }

       
       header("Location: createMovie.php");
        $stmt->close();
    }

    // Prepare the SQL statement with a placeholder for ID parameter
    $sql = "SELECT * FROM adminfilm WHERE id=?";
    $stmt = $conn->prepare($sql);

    // Bind the ID parameter to the placeholder
    $stmt->bind_param("i", $id);

    // Execute the query
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();
    

    // If the record exists, display the edit form
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
?>
       

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./cretateMovie.css"/>
    <title>Edit</title>
</head>
<body>
<header class="header">
        <h3 class="logo"> <img src="Logo.jpg"></h3>
        <nav class="navbar">
          <ul class="navbar-list">
            <li><a class="navbar-link" href="#">Service</a></li>
            <li><a class="navbar-link" href="login.php">Log Out</a></li>
          </ul>
        </nav>
  </header>
  <div class="forms">

     <form method="POST" action="edit.php?id=<?php echo $id;?>">
            <label for="emri">Emri:</label>
            <input type="text" name="emri"  value="<?php echo $row['emri']; ?>"><br>
            <label for="image_path">Image Path:</label>
            <input type="file" name="image_path" id="image_path" value="<?php echo $row['image_path']; ?>"><br>
            <label for="description">Description:</label>
            <textarea name="description" id="description"><?php echo $row['description']; ?></textarea><br>
            <input type="submit" value="Save Changes" class="editbtn" style="backgroung-color:#8c8f92"><br>
        </form>
       
<?php
    } else {
        echo "Record not found.";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "ID parameter not set.";
}
?>
</div>
</body>
</html>
