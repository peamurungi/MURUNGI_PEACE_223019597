<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Student Registration Form</title>
  <style>
    body { font-family: Arial; margin: 20px; }
    h2 { text-align: center; }
    table { width: 100%; border-collapse: collapse; }
    td { padding: 6px; }
    input, select, textarea { padding: 5px; font-size: 14px; }
    th { background: #f0f0f0; }
  </style>
</head>
<body>
  <h2>STUDENT REGISTRATION FORM</h2>
  <form action="connect.php" method="POST">
    <table>
      <tr><td>FIRST NAME</td><td><input type="text" name="first_name" required></td></tr>
      <tr><td>LAST NAME</td><td><input type="text" name="last_name" required></td></tr>
      <tr>
        <td>DATE OF BIRTH</td>
        <td>
          <select name="day">
            <option value="">Day</option>
            <?php for($i=1;$i<=31;$i++) echo "<option>$i</option>"; ?>
          </select>
          <select name="month">
            <option value="">Month</option>
            <option>January</option><option>February</option><option>March</option>
            <option>April</option><option>May</option><option>June</option>
            <option>July</option><option>August</option><option>September</option>
            <option>October</option><option>November</option><option>December</option>
          </select>
          <select name="year">
            <option value="">Year</option>
            <?php for($y=1980;$y<=2026;$y++) echo "<option>$y</option>"; ?>
          </select>
        </td>
      </tr>
      <tr><td>EMAIL ID</td><td><input type="email" name="email" required></td></tr>
      <tr><td>MOBILE NUMBER</td><td><input type="text" name="mobile" required></td></tr>
      <tr>
        <td>GENDER</td>
        <td>
          <input type="radio" name="gender" value="Male"> Male
          <input type="radio" name="gender" value="Female"> Female
        </td>
      </tr>
      <tr><td>ADDRESS</td><td><textarea name="address"></textarea></td></tr>
      <tr><td>CITY</td><td><input type="text" name="city"></td></tr>
      <tr><td>PIN CODE</td><td><input type="text" name="pincode"></td></tr>
      <tr><td>STATE</td><td><input type="text" name="state"></td></tr>
      <tr>
        <td>COUNTRY</td>
        <td>
          <select name="country">
            <option>India</option>
            <option>Rwanda</option>
            <option>USA</option>
            <option>UK</option>
            <option>Canada</option>
            <option>Australia</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>HOBBIES</td>
        <td>
          <input type="checkbox" name="hobbies[]" value="Drawing"> Drawing
          <input type="checkbox" name="hobbies[]" value="Singing"> Singing
          <input type="checkbox" name="hobbies[]" value="Dancing"> Dancing
          <input type="checkbox" name="hobbies[]" value="Sketching"> Sketching
          <input type="checkbox" name="hobbies[]" value="Others"> Others
          <input type="text" name="hobby_other" placeholder="Specify if Others">
        </td>
      </tr>
    </table>

    <h3>QUALIFICATION</h3>
    <table border="1" cellpadding="4">
      <tr>
        <th>Sl.No.</th><th>Examination</th><th>Board (10 char max)</th>
        <th>Percentage (upto 2 decimal)</th><th>Year of Passing</th>
      </tr>
      <tr><td>1</td><td>Class X</td>
        <td><input type="text" name="exam1_board" maxlength="10"></td>
        <td><input type="text" name="exam1_percentage"></td>
        <td><input type="text" name="exam1_year"></td>
      </tr>
      <tr><td>2</td><td>Class XII</td>
        <td><input type="text" name="exam2_board" maxlength="10"></td>
        <td><input type="text" name="exam2_percentage"></td>
        <td><input type="text" name="exam2_year"></td>
      </tr>
      <tr><td>3</td><td>Graduation</td>
        <td><input type="text" name="exam3_board" maxlength="10"></td>
        <td><input type="text" name="exam3_percentage"></td>
        <td><input type="text" name="exam3_year"></td>
      </tr>
      <tr><td>4</td><td>Masters</td>
        <td><input type="text" name="exam4_board" maxlength="10"></td>
        <td><input type="text" name="exam4_percentage"></td>
        <td><input type="text" name="exam4_year"></td>
      </tr>
    </table>

    <h3>COURSES APPLIED FOR</h3>
    <input type="radio" name="course" value="BCA"> BCA
    <input type="radio" name="course" value="B.Com"> B.Com
    <input type="radio" name="course" value="B.Sc"> B.Sc
    <input type="radio" name="course" value="B.A"> B.A
    <br><br>
    <input type="submit" value="Submit">
    <input type="reset" value="Reset">
  </form>
</body>
</html>
