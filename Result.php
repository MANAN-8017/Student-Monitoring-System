<?php
session_start();
require_once "config.php";

if ($_SESSION['role'] !== 'student') {
    header("Location: login.php");
    exit();
}
function getGrade($marks, $total) {
  if ($marks >= $total*0.9) return "AA";
  elseif ($marks >= $total*0.8) return "AB";
  elseif ($marks >= $total*0.7) return "BB";
  elseif ($marks >= $total*0.6) return "BC";
  elseif ($marks >= $total*0.5) return "CC";
  elseif ($marks >= $total*0.4) return "CD";
  else return "F";
}

function getGradePoint($marks, $total) {
  if ($marks >= $total*0.9) return 10;
  elseif ($marks >= $total*0.8) return 9;
  elseif ($marks >= $total*0.7) return 8;
  elseif ($marks >= $total*0.6) return 7;
  elseif ($marks >= $total*0.5) return 6;
  elseif ($marks >= $total*0.4) return 5;
  else return 0;
}

$student_id = $_SESSION['student_id'];
$sql = "SELECT * FROM grades WHERE student_id = '$student_id' ";
$result = mysqli_query($link, $sql);

if (!$result) {
    die("Query Failed: " . mysqli_error($link));
}
 
$spi=0.0;
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
      <td>
          <?php
            $sql = "SELECT * FROM grades WHERE subject = 'MATHS' && student_id = '$student_id' ";
            $result = mysqli_query($link, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
              $obtained = $row['Obtained_Marks'];
              $total = $row['Total_Marks'];
              echo getGrade($obtained, $total);
              $spi += 4.0*getGradePoint($obtained, $total);
            }
          ?>
        </td>
    </tr>
    
    <tr>
      <td>Semiconductor Physics</td>
      <td>
          <?php
            $sql = "SELECT * FROM grades WHERE subject = 'SCP' && student_id = '$student_id'";
            $result = mysqli_query($link, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
              $obtained = $row['Obtained_Marks'];
              $total = $row['Total_Marks'];
              echo getGrade($obtained, $total);
              $spi += 5.0*getGradePoint($obtained, $total);
            }
          ?>
      </td>
    </tr>

    <tr>
      <td>PPS-II</td>
      <td>
          <?php
            $sql = "SELECT * FROM grades WHERE subject = 'PPS' && student_id = '$student_id'";
            $result = mysqli_query($link, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
              $obtained = $row['Obtained_Marks'];
              $total = $row['Total_Marks'];
              echo getGrade($obtained, $total);
              $spi += 5.5*getGradePoint($obtained, $total);
            }
          ?>
      </td>
    </tr>
    
    <tr>
      <td>Hardware Workshop</td>
      <td>
      <?php
            $sql = "SELECT * FROM grades WHERE subject = 'HW' && student_id = '$student_id'";
            $result = mysqli_query($link, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
              $obtained = $row['Obtained_Marks'];
              $total = $row['Total_Marks'];
              echo getGrade($obtained, $total);
              $spi += 2.0*getGradePoint($obtained, $total);
            }
          ?>
      </td>
    </tr>

    <tr>
      <td>English</td>
      <td>
      <?php
            $sql = "SELECT * FROM grades WHERE subject = 'English' && student_id = '$student_id'";
            $result = mysqli_query($link, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
              $obtained = $row['Obtained_Marks'];
              $total = $row['Total_Marks'];
              echo getGrade($obtained, $total);
              $spi += 3.0*getGradePoint($obtained, $total);
            }
          ?>
      </td>
    </tr>
    
    <tr>
      <td>Environmental-Studies</td>
      <td>
      <?php
            $sql = "SELECT * FROM grades WHERE subject = 'EVS' && student_id = '$student_id'";
            $result = mysqli_query($link, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
              $obtained = $row['Obtained_Marks'];
              $total = $row['Total_Marks'];
              echo getGrade($obtained, $total);
              $spi +=  0.0*getGradePoint($obtained, $total);
            }
          ?>
      </td>
    </tr>
    
  </table>
  
  <h4>SPI : 
<?php
  echo round($spi/19.5,2);
?>
  </h4>
</section>
  <a href="StudentHome.php">Back</a>