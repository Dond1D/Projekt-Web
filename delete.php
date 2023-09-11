<?php
// Check if ID parameter is set
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Create a new mysqli instance
    $conn = new mysqli("localhost", "root", "Donjet123@", "filmat");

    // Check for connection errors
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the SQL statement with a placeholder for ID parameter
    $sql = "DELETE FROM adminfilm WHERE id = ?";
    $stmt = $conn->prepare($sql);

    // Bind the ID parameter to the placeholder
    $stmt->bind_param("i", $id);

    // Execute the query
    $stmt->execute();

    // Close the statement and connection
    $stmt->close();
    $conn->close();

    // Redirect to the index.php page
    header('location: createMovie.php');
} else {
    echo "ID parameter not set.";
}
?>
