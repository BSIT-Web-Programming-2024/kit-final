<?php
// Database configuration
$servername = "localhost";
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "portfolio";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$full_name = isset($_POST['full_name']) ? $_POST['full_name'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$phone_number = isset($_POST['phone_number']) ? $_POST['phone_number'] : '';
$subject = isset($_POST['subject']) ? $_POST['subject'] : '';
$message = isset($_POST['message']) ? $_POST['message'] : '';

// Insert form data into the database
$sql = "INSERT INTO contact_form (full_name, email, phone_number, subject, message)
        VALUES ('$full_name', '$email', '$phone_number', '$subject', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "Message sent successfully, thank you so much!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
