<?php
session_start();
require_once "config.php";
if ($_SESSION['role'] !== 'student') {
    header("Location: login.php");
    exit();
}
$student_id = $_SESSION['id'];
?>

<link rel="stylesheet" href="student.css">

<section class="education">
  
  <h2>Attendance</h2>
  
  <table>
    
    <tr>
      <th>Subject</th>
      <th>Total</th>
      <th>Present</th>
      <th>Attendance</th>
    </tr>

    <tr>
      <td>Mathematics-II</td>
      <td>
        <?php
          $sql = "SELECT * FROM attendance WHERE subject = 'MATHS'";
          $result = mysqli_query($link, $sql);
          while ($row = mysqli_fetch_assoc($result)) {
            echo $row['Total'] ;
          }
        ?>
      </td>
      <td>
        <?php
          $sql = "SELECT * FROM attendance WHERE subject = 'MATHS'";
          $result = mysqli_query($link, $sql);
          while ($row = mysqli_fetch_assoc($result)) {
            echo $row['Present'] ;
          }
        ?>
      </td>
      <td>
        <?php
          $sql = "SELECT * FROM attendance WHERE subject = 'MATHS'";
          $result = mysqli_query($link, $sql);
          while ($row = mysqli_fetch_assoc($result)) {
            $percentage = round($row['Present'] / $row['Total'] * 100, 2);
            $color = ($percentage < 75) ? "red" : "black";
            echo "<span style='color: $color;'>{$percentage}%</span>";
          }
        ?>
      </td>
    </tr>
    
    <tr>
      <td>Semiconductor Physics</td>
      <td>
        <?php
          $sql = "SELECT * FROM attendance WHERE subject = 'SCP'";
          $result = mysqli_query($link, $sql);
          while ($row = mysqli_fetch_assoc($result)) {
            echo $row['Total'] ;
          }
        ?>
      </td>
      <td>
        <?php
          $sql = "SELECT * FROM attendance WHERE subject = 'SCP'";
          $result = mysqli_query($link, $sql);
          while ($row = mysqli_fetch_assoc($result)) {
            echo $row['Present'] ;
          }
        ?>
      </td>
      <td>
        <?php
          $sql = "SELECT * FROM attendance WHERE subject = 'SCP'";
          $result = mysqli_query($link, $sql);
          while ($row = mysqli_fetch_assoc($result)) {
            $percentage = round($row['Present'] / $row['Total'] * 100, 2);
            $color = ($percentage < 75) ? "red" : "black";
            echo "<span style='color: $color;'>{$percentage}%</span>";
          }
        ?>

      </td>
    </tr>

    
    <tr>
      <td>PPS-II</td>
      <td>
        <?php
          $sql = "SELECT * FROM attendance WHERE subject = 'PPS'";
          $result = mysqli_query($link, $sql);
          while ($row = mysqli_fetch_assoc($result)) {
            echo $row['Total'] ;
          }
        ?>
      </td>
      <td>
        <?php
          $sql = "SELECT * FROM attendance WHERE subject = 'PPS'";
          $result = mysqli_query($link, $sql);
          while ($row = mysqli_fetch_assoc($result)) {
            echo $row['Present'] ;
          }
        ?>
      </td>
      <td>
        <?php
          $sql = "SELECT * FROM attendance WHERE subject = 'PPS'";
          $result = mysqli_query($link, $sql);
          while ($row = mysqli_fetch_assoc($result)) {
            $percentage = round($row['Present'] / $row['Total'] * 100, 2);
            $color = ($percentage < 75) ? "red" : "black";
            echo "<span style='color: $color;'>{$percentage}%</span>";
          }
        ?>
      </td>
    </tr>
    
    <tr>
      <td>Hardware Workshop</td>
      <td>
        <?php
          $sql = "SELECT * FROM attendance WHERE subject = 'HW'";
          $result = mysqli_query($link, $sql);
          while ($row = mysqli_fetch_assoc($result)) {
            echo $row['Total'] ;
          }
          ?>
      </td>
      <td>
        <?php
          $sql = "SELECT * FROM attendance WHERE subject = 'HW'";
          $result = mysqli_query($link, $sql);
          while ($row = mysqli_fetch_assoc($result)) {
            echo $row['Present'] ;
          }
        ?>
      </td>
      <td>
        <?php
          $sql = "SELECT * FROM attendance WHERE subject = 'HW'";
          $result = mysqli_query($link, $sql);
          while ($row = mysqli_fetch_assoc($result)) {
            $percentage = round($row['Present'] / $row['Total'] * 100, 2);
            $color = ($percentage < 75) ? "red" : "black";
            echo "<span style='color: $color;'>{$percentage}%</span>";
          }
        ?>
      </td>
    </tr>
    
    <tr>
      <td>English</td>
      <td>
        <?php
          $sql = "SELECT * FROM attendance WHERE subject = 'ENGLISH'";
          $result = mysqli_query($link, $sql);
          while ($row = mysqli_fetch_assoc($result)) {
            echo $row['Total'] ;
          }
        ?>
      </td>
      <td>
        <?php
          $sql = "SELECT * FROM attendance WHERE subject = 'ENGLISH'";
          $result = mysqli_query($link, $sql);
          while ($row = mysqli_fetch_assoc($result)) {
            echo $row['Present'] ;
          }
        ?>
      </td>
      <td>
        <?php
          $sql = "SELECT * FROM attendance WHERE subject = 'ENGLISH'";
          $result = mysqli_query($link, $sql);
          while ($row = mysqli_fetch_assoc($result)) {
            $percentage = round($row['Present'] / $row['Total'] * 100, 2);
            $color = ($percentage < 75) ? "red" : "black";
            echo "<span style='color: $color;'>{$percentage}%</span>";
          }
        ?>
      </td>
    </tr>
        
    <tr>
      <td>Environmental-Studies</td>
      <td>
        <?php
          $sql = "SELECT * FROM attendance WHERE subject = 'EVS'";
          $result = mysqli_query($link, $sql);
          while ($row = mysqli_fetch_assoc($result)) {
            echo $row['Total'] ;
          }
        ?>
      </td>
      <td>
        <?php
          $sql = "SELECT * FROM attendance WHERE subject = 'EVS'";
          $result = mysqli_query($link, $sql);
          while ($row = mysqli_fetch_assoc($result)) {
            echo $row['Present'] ;
          }
        ?>
      </td>
      <td>
        <?php
          $sql = "SELECT * FROM attendance WHERE subject = 'EVS'";
          $result = mysqli_query($link, $sql);
          while ($row = mysqli_fetch_assoc($result)) {
            $percentage = round($row['Present'] / $row['Total'] * 100, 2);
            $color = ($percentage < 75) ? "red" : "black";
            echo "<span style='color: $color;'>{$percentage}%</span>";
          }
        ?>

      </td>
    </tr>
  </table>
      
  <h4>Total : 
    <?php
      $arr_p=0;
      $arr_t=0;
      $sql = "SELECT * FROM attendance";
      $result = mysqli_query($link, $sql);
      while ($row = mysqli_fetch_assoc($result)) {
        $arr_p += $row['Present'];
        $arr_t += $row['Total'];
      }
      $percentage = round($arr_p/$arr_t*100,2);
      $color = ($percentage < 75) ? "red" : "black";
      echo "<span style='color: $color;'>{$percentage}%</span>";

    ?>
  </h4>
  <a href="StudentHome.php">Back</a>