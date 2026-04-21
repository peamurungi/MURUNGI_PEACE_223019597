<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = trim($_POST['full_name']);
    $email     = trim($_POST['email']);
    $phone     = trim($_POST['phone']);
    $location  = trim($_POST['location']);
    $message   = trim($_POST['message']);

    // Basic validation
    if (empty($full_name) || empty($email) || empty($phone) || empty($location) || empty($message)) {
        die("All fields are required.");
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }

    // Validate phone (digits only, length between 7–15)
    if (!preg_match("/^[0-9]{7,15}$/", $phone)) {
        die("Invalid phone number. Must be 7–15 digits.");
    }

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO contacts (full_name, email, phone, location, message) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $full_name, $email, $phone, $location, $message);

    if ($stmt->execute()) {
        echo "Message sent successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
