<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Allowed menu items
    $allowed_items = ["Fish", "Drink", "Fresh Juice"];
    $menu_item = $_POST['menu_item'];

    // Validate menu item
    if (!in_array($menu_item, $allowed_items)) {
        die("Invalid menu item selected.");
    }

    $stmt = $conn->prepare("INSERT INTO orders (full_name, email, phone, menu_item, address, order_date) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", 
        $_POST['full_name'], 
        $_POST['email'], 
        $_POST['phone'], 
        $menu_item, 
        $_POST['address'], 
        $_POST['order_date']
    );

    if ($stmt->execute()) {
        // Show confirmation page
        echo "<!DOCTYPE html>
        <html>
        <head>
          <title>Order Confirmation</title>
          <link rel='stylesheet' href='style.css'>
        </head>
        <body>
          <h2>Order Confirmation</h2>
          <p>Thank you, <strong>{$_POST['full_name']}</strong>! Your order has been placed successfully.</p>
          <h3>Order Details:</h3>
          <ul>
            <li><strong>Menu Item:</strong> {$menu_item}</li>
            <li><strong>Email:</strong> {$_POST['email']}</li>
            <li><strong>Phone:</strong> {$_POST['phone']}</li>
            <li><strong>Address:</strong> {$_POST['address']}</li>
            <li><strong>Date:</strong> {$_POST['order_date']}</li>
          </ul>
          <br>
          <a href='index.html'>Back to Home</a>
        </body>
        </html>";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
