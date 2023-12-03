<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Get the form data
    $studentCode = $_POST['studentCode'];
    $password = $_POST['password'];
    $department = $_POST['department'];
    $log = $_POST['log'];
    $name = $_POST['name'];

    // Validate the data if needed

    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "library";

    // Create a connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the SQL query
    $sql = "INSERT INTO bookRequests (studentCode, password, department, log, name) VALUES ('$studentCode', '$password', '$department', '$log', '$name')";

    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // Redirect or handle the case when the form is not submitted
    echo "Form not submitted.";
}
?>
