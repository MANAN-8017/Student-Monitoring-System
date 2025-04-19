<?php
session_start();
require_once "config.php";
if ($_SESSION['role'] !== 'student') {
    header("Location: login.php");
    exit();
  }
  $student_id = $_SESSION['id'];
  $sql = "SELECT * FROM grades WHERE student_id = $student_id";
  $result = mysqli_query($link, $sql);
while ($row = mysqli_fetch_assoc($result)) {
  echo "Subject: " . $row['subject'] . " - Grade: " . $row['grade'] . "<br>";
}
?>

<link rel="stylesheet" href="student.css">

<section class="education">
  
  <h2>Result</h2>
  
  <table>
    <tr>
      <th>Subject</th>
      <th>Grade</th>
    </tr>
    
    <tr>
      <td>Mathematics-II</td>
      <td>AA</td>
    </tr>
    
    <tr>
      <td>Semiconductor Physics</td>
      <td>BB</td>
    </tr>

    <tr>
      <td>PPS-II</td>
      <td>AB</td>
    </tr>
    
    <tr>
      <td>Hardware Workshop</td>
      <td>AA</td>
    </tr>

    <tr>
      <td>English</td>
      <td>BB</td>
    </tr>
    
    <tr>
      <td>Environmental-Studies</td>
      <td>BC</td>
    </tr>
    
  </table>
  
  <h4>SPI : 8.89 </h4>
</section>
  <a href="StudentHome.php">Back</a>