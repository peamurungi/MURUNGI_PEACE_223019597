<?php
session_start();
include 'db.php';

// Check if logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Customer Orders</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h2>Customer Orders</h2>

  <?php
  $result = $conn->query("SELECT * FROM orders ORDER BY order_date DESC");

  if ($result->num_rows > 0) {
      echo "<table border='1'>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Menu Item</th>
                <th>Address</th>
                <th>Date</th>
              </tr>";
      while ($row = $result->fetch_assoc()) {
          echo "<tr>
                  <td>{$row['id']}</td>
                  <td>{$row['full_name']}</td>
                  <td>{$row['email']}</td>
                  <td>{$row['phone']}</td>
                  <td>{$row['menu_item']}</td>
                  <td>{$row['address']}</td>
                  <td>{$row['order_date']}</td>
                </tr>";
      }
      echo "</table>";
  } else {
      echo "No orders found.";
  }
  ?>

  <br>
  <a href="admin.php">Back to Dashboard</a> | 
  <a href="logout.php">Logout</a>
</body>
</html>
