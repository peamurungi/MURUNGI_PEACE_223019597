<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

include 'db.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboard</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }
    table {
      border-collapse: collapse;
      width: 90%;
      margin: 20px auto;
    }
    th, td {
      border: 1px solid #333;
      padding: 8px;
      text-align: center;
    }
    th {
      background-color: #eee;
    }
    h2, h3 {
      text-align: center;
    }
    .logout {
      text-align: center;
      margin-top: 20px;
    }
  </style>
</head>
<body>
  <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
  <p style="text-align:center;">You are now logged in to the admin dashboard.</p>

  <!-- Orders Section -->
  <h3>Orders</h3>
  <table>
    <?php
    $result = $conn->query("SELECT * FROM orders");
    if ($result && $result->num_rows > 0) {
        // Print headers dynamically
        echo "<tr>";
        foreach ($result->fetch_fields() as $field) {
            echo "<th>" . htmlspecialchars($field->name) . "</th>";
        }
        echo "</tr>";

        // Reset pointer and print rows
        $result->data_seek(0);
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>" . htmlspecialchars($value) . "</td>";
            }
            echo "</tr>";
        }
    } else {
        echo "<tr><td>No orders found.</td></tr>";
    }
    ?>
  </table>

  <!-- Contacts Section -->
  <h3>Contact Messages</h3>
  <table>
    <?php
    $result = $conn->query("SELECT * FROM contacts");
    if ($result && $result->num_rows > 0) {
        // Print headers dynamically
        echo "<tr>";
        foreach ($result->fetch_fields() as $field) {
            echo "<th>" . htmlspecialchars($field->name) . "</th>";
        }
        echo "</tr>";

        // Reset pointer and print rows
        $result->data_seek(0);
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>" . htmlspecialchars($value) . "</td>";
            }
            echo "</tr>";
        }
    } else {
        echo "<tr><td>No contacts found.</td></tr>";
    }
    ?>
  </table>

  <div class="logout">
    <a href="logout.php">Logout</a>
  </div>
</body>
</html>
