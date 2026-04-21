<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project2_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

$student = null;
if (isset($_GET['id'])) {
  $id = intval($_GET['id']);
  $result = $conn->query("SELECT * FROM students WHERE id=$id");
  $student = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = intval($_POST['id']);
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
  if (!empty($_POST['hobby_other'])) { $hobbies .= " (" . $_POST['hobby_other'] . ")"; }

  // Qualifications
  $exam1_board = $_POST['exam1_board']; $exam1_percentage = $_POST['exam1_percentage']; $exam1_year = $_POST['exam1_year'];
  $exam2_board = $_POST['exam2_board']; $exam2_percentage = $_POST['exam2_percentage']; $exam2_year = $_POST['exam2_year'];
  $exam3_board = $_POST['exam3_board']; $exam3_percentage = $_POST['exam3_percentage']; $exam3_year = $_POST['exam3_year'];
  $exam4_board = $_POST['exam4_board']; $exam4_percentage = $_POST['exam4_percentage']; $exam4_year = $_POST['exam4_year'];

  $sql = "UPDATE students SET 
          first_name='$first', last_name='$last', day='$day', month='$month', year='$year',
          email='$email', mobile='$mobile', gender='$gender', address='$address', city='$city',
          pincode='$pincode', state='$state', country='$country', hobby='$hobbies', course='$course',
          exam1_board='$exam1_board', exam1_percentage='$exam1_percentage', exam1_year='$exam1_year',
          exam2_board='$exam2_board', exam2_percentage='$exam2_percentage', exam2_year='$exam2_year',
          exam3_board='$exam3_board', exam3_percentage='$exam3_percentage', exam3_year='$exam3_year',
          exam4_board='$exam4_board', exam4_percentage='$exam4_percentage', exam4_year='$exam4_year'
          WHERE id=$id";

  if ($conn->query($sql) === TRUE) {
    echo "<p style='color:green;'>Student updated successfully!</p>";
    echo "<form action='list_students.php' method='get' style='display:inline;'>
            <input type='submit' value='Back to Student List'>
          </form>";
    echo "<form action='student_form.php' method='get' style='display:inline; margin-left:10px;'>
            <input type='submit' value='Register New Student'>
          </form>";
    exit;
  } else { echo "Error updating record: " . $conn->error; }
}
?>

<h2>Edit Student</h2>
<form method="POST" action="edit_student.php">
  <input type="hidden" name="id" value="<?php echo $student['id']; ?>">

  <!-- Personal Info -->
  <table>
    <tr><td>FIRST NAME</td><td><input type="text" name="first_name" value="<?php echo $student['first_name']; ?>"></td></tr>
    <tr><td>LAST NAME</td><td><input type="text" name="last_name" value="<?php echo $student['last_name']; ?>"></td></tr>
    <tr>
      <td>DATE OF BIRTH</td>
      <td>
        <select name="day"><?php for($i=1;$i<=31;$i++){ $sel=($student['day']==$i)?"selected":""; echo "<option $sel>$i</option>"; } ?></select>
        <select name="month"><?php $months=["January","February","March","April","May","June","July","August","September","October","November","December"]; foreach($months as $m){ $sel=($student['month']==$m)?"selected":""; echo "<option $sel>$m</option>"; } ?></select>
        <select name="year"><?php for($y=1980;$y<=2026;$y++){ $sel=($student['year']==$y)?"selected":""; echo "<option $sel>$y</option>"; } ?></select>
      </td>
    </tr>
    <tr><td>EMAIL ID</td><td><input type="email" name="email" value="<?php echo $student['email']; ?>"></td></tr>
    <tr><td>MOBILE NUMBER</td><td><input type="text" name="mobile" value="<?php echo $student['mobile']; ?>"></td></tr>
    <tr><td>GENDER</td><td><input type="text" name="gender" value="<?php echo $student['gender']; ?>"></td></tr>
    <tr><td>ADDRESS</td><td><textarea name="address"><?php echo $student['address']; ?></textarea></td></tr>
    <tr><td>CITY</td><td><input type="text" name="city" value="<?php echo $student['city']; ?>"></td></tr>
    <tr><td>PIN CODE</td><td><input type="text" name="pincode" value="<?php echo $student['pincode']; ?>"></td></tr>
    <tr><td>STATE</td><td><input type="text" name="state" value="<?php echo $student['state']; ?>"></td></tr>
    <tr><td>COUNTRY</td><td><input type="text" name="country" value="<?php echo $student['country']; ?>"></td></tr>
    <tr><td>HOBBIES</td><td>
      <?php $hobbyList=["Drawing","Singing","Dancing","Sketching","Others"]; foreach($hobbyList as $h){ $checked=(strpos($student['hobby'],$h)!==false)?"checked":""; echo "<input type='checkbox' name='hobbies[]' value='$h' $checked> $h "; } ?>
      <input type="text" name="hobby_other" placeholder="Specify if Others">
    </td></tr>
  </table>

  <!-- Qualifications -->
  <h3>QUALIFICATION</h3>
  <table border="1" cellpadding="4">
    <tr><th>Sl.No.</th><th>Examination</th><th>Board</th><th>Percentage</th><th>Year of Passing</th></tr>
    <tr><td>1</td><td>Class X</td><td><input type="text" name="exam1_board" value="<?php echo $student['exam1_board']; ?>"></td><td><input type="text" name="exam1_percentage" value="<?php echo $student['exam1_percentage']; ?>"></td><td><input type="text" name="exam1_year" value="<?php echo $student['exam1_year']; ?>"></td></tr>
    <tr><td>2</td><td>Class XII</td><td><input type="text" name="exam2_board" value="<?php echo $student['exam2_board']; ?>"></td><td><input type="text" name="exam2_percentage" value="<?php echo $student['exam2_percentage']; ?>"></td><td><input type="text" name="exam2_year" value="<?php echo $student['exam2_year']; ?>"></td></tr>
    <tr><td>3</td><td>Graduation</td><td><input type="text" name="exam3_board" value="<?php echo $student['exam3_board']; ?>"></td><td><input type="text" name    <tr><td>4</td><td>Masters</td>
      <td><input type="text" name="exam4_board" value="<?php echo $student['exam4_board']; ?>"></td>
      <td><input type="text" name="exam4_percentage" value="<?php echo $student['exam4_percentage']; ?>"></td>
      <td><input type="text" name="exam4_year" value="<?php echo $student['exam4_year']; ?>"></td>
    </tr>
  </table>

  <!-- Buttons -->
  <br>
  <input type="submit" value="Update Student">
  <input type="button" value="Cancel" onclick="window.location.href='list_students.php'">
</form>
