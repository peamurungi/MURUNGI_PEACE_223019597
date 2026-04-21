<?php
session_start();
include 'db.php';

// Check if logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

echo "<h2>Contact Messages</h2>";

$result = $conn->query("SELECT * FROM contacts");

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
              <th>ID</th><th>Name</th><th>Email</th><th>Phone</th>
              <th>Location</th><th>Message</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['full_name']}</td>
                <td>{$row['email']}</td>
                <td>{$row['phone']}</td>
                <td>{$row['location']}</td>
                <td>{$row['message']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No messages found.";
}

echo "<br><a href='logout.php'>Logout</a>";
?>
