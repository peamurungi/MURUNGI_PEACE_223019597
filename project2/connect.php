<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project2_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Collect form data
$first = $_POST['first_name'];
$last = $_POST['last_name'];
$day = $_POST['day'];
$month = $_POST['month'];
$year = $_POST['year'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$city = $_POST['city'];
$pincode = $_POST['pincode'];
$state = $_POST['state'];
$country = $_POST['country'];
$course = $_POST['course'];

// Hobbies
$hobbies = isset($_POST['hobbies']) ? implode(", ", $_POST['hobbies']) : '';
if (!empty($_POST['hobby_other'])) {
    $hobbies .= " (" . $_POST['hobby_other'] . ")";
}

// Qualifications
$exam1_board = $_POST['exam1_board'];
$exam1_percentage = $_POST['exam1_percentage'];
$exam1_year = $_POST['exam1_year'];

$exam2_board = $_POST['exam2_board'];
$exam2_percentage = $_POST['exam2_percentage'];
$exam2_year = $_POST['exam2_year'];

$exam3_board = $_POST['exam3_board'];
$exam3_percentage = $_POST['exam3_percentage'];
$exam3_year = $_POST['exam3_year'];

$exam4_board = $_POST['exam4_board'];
$exam4_percentage = $_POST['exam4_percentage'];
$exam4_year = $_POST['exam4_year'];

// Insert into database
$sql = "INSERT INTO students 
(first_name, last_name, day, month, year, email, mobile, gender, address, city, pincode, state, country, hobby, exam1_board, exam1_percentage, exam1_year, exam2_board, exam2_percentage, exam2_year, exam3_board, exam3_percentage, exam3_year, exam4_board, exam4_percentage, exam4_year, course) 
VALUES 
('$first', '$last', '$day', '$month', '$year', '$email', '$mobile', '$gender', '$address', '$city', '$pincode', '$state', '$country', '$hobbies', '$exam1_board', '$exam1_percentage', '$exam1_year', '$exam2_board', '$exam2_percentage', '$exam2_year', '$exam3_board', '$exam3_percentage', '$exam3_year', '$exam4_board', '$exam4_percentage', '$exam4_year', '$course')";

if ($conn->query($sql) === TRUE) {
  echo "<p style='color:green;'>Student registered successfully!</p>";
  echo "<form action='student_form.php' method='get' style='display:inline;'>
          <input type='submit' value='Register Another Student'>
        </form>";
  echo "<form action='list_students.php' method='get' style='display:inline; margin-left:10px;'>
          <input type='submit' value='View Student List'>
        </form>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
