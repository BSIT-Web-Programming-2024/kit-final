<?php
// Database credentials
$servername = "localhost"; // or your database server
$username = "root";        // your database username
$password = "";            // your database password
$dbname = "my_database";   // your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$username = $_POST['username'];
$password = $_POST['password']; // You can hash the password for security
$full_name = $_POST['full_name'];
$email = $_POST['email'];
$phone_number = $_POST['phone_number'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Prepare and bind the SQL statement
$stmt = $conn->prepare("INSERT INTO contact_messages (username, email, phone_number, subject, message) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $username, $email, $phone_number, $subject, $message);

// Execute the query
if ($stmt->execute()) {
    echo "Message sent successfully!";
} else {
    echo "Error: " . $stmt->error;
}

// Close connection
$stmt->close();
$conn->close();
?>
