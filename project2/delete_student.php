<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project2_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

if (isset($_GET['id'])) {
  $id = intval($_GET['id']);
  $sql = "DELETE FROM students WHERE id=$id";

  if ($conn->query($sql) === TRUE) {
    echo "<p style='color:green;'>Student deleted successfully!</p>";
  } else {
    echo "Error deleting record: " . $conn->error;
  }
} else {
  echo "No student ID provided.";
}

$conn->close();

// Navigation buttons
echo "<form action='list_students.php' method='get' style='display:inline;'>
        <input type='submit' value='Back to Student List'>
      </form>";
echo "<form action='student_form.php' method='get' style='display:inline; margin-left:10px;'>
        <input type='submit' value='Register New Student'>
      </form>";
?>
