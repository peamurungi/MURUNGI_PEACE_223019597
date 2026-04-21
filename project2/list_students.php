<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project2_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

$sql = "SELECT * FROM students";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Student List</title>
  <style>
    body { font-family: Arial; margin: 20px; }
    h2 { text-align: center; }
    table { width: 100%; border-collapse: collapse; margin-top: 20px; }
    th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
    th { background: #f0f0f0; }
    .actions { text-align: center; margin-top: 20px; }
    .actions form { display: inline; margin: 0 10px; }
  </style>
</head>
<body>
  <h2>Registered Students</h2>

  <table>
    <tr>
      <th>ID</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>DOB</th>
      <th>Email</th>
      <th>Mobile</th>
      <th>Gender</th>
      <th>Address</th>
      <th>City</th>
      <th>Pincode</th>
      <th>State</th>
      <th>Country</th>
      <th>Hobbies</th>
      <th>Course</th>
      <th>Class X</th>
      <th>Class XII</th>
      <th>Graduation</th>
      <th>Masters</th>
      <th>Actions</th>
    </tr>

    <?php
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['first_name']."</td>";
        echo "<td>".$row['last_name']."</td>";
        echo "<td>".$row['day']." ".$row['month']." ".$row['year']."</td>";
        echo "<td>".$row['email']."</td>";
        echo "<td>".$row['mobile']."</td>";
        echo "<td>".$row['gender']."</td>";
        echo "<td>".$row['address']."</td>";
        echo "<td>".$row['city']."</td>";
        echo "<td>".$row['pincode']."</td>";
        echo "<td>".$row['state']."</td>";
        echo "<td>".$row['country']."</td>";
        echo "<td>".$row['hobby']."</td>";
        echo "<td>".$row['course']."</td>";
        echo "<td>".$row['exam1_board']." (".$row['exam1_percentage']."%) ".$row['exam1_year']."</td>";
        echo "<td>".$row['exam2_board']." (".$row['exam2_percentage']."%) ".$row['exam2_year']."</td>";
        echo "<td>".$row['exam3_board']." (".$row['exam3_percentage']."%) ".$row['exam3_year']."</td>";
        echo "<td>".$row['exam4_board']." (".$row['exam4_percentage']."%) ".$row['exam4_year']."</td>";
        echo "<td>
                <a href='edit_student.php?id=".$row['id']."'>Edit</a> | 
                <a href='delete_student.php?id=".$row['id']."' onclick=\"return confirm('Are you sure?');\">Delete</a>
              </td>";
        echo "</tr>";
      }
    } else {
      echo "<tr><td colspan='19'>No students registered yet.</td></tr>";
    }
    ?>
  </table>

  <div class="actions">
    <form action="student_form.php" method="get">
      <input type="submit" value="Register New Student">
    </form>
  </div>
</body>
</html>
