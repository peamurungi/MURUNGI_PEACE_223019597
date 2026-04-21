<?php
include 'db.php';

$username = "admin";
$passwordPlain = "admin123";

// Check if user exists
$stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    echo "User '$username' already exists.";
} else {
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $passwordPlain);

    if ($stmt->execute()) {
        echo "Admin created successfully.<br>";
        echo "Username: $username<br>";
        echo "Password: $passwordPlain<br>";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
