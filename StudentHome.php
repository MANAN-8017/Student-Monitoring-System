<?php
session_start();
require_once "config.php";
if ($_SESSION['role'] !== 'student') {
    header("Location: login.php");
    exit();
}
$student_id = $_SESSION['id'];
?>

<link rel="stylesheet" href="style.css">

<div class="container">
    <h1 style="color:#1d5d5f">Welcome <?php echo $_SESSION['name']; ?>,</h1>
    
    <ul>
        <li><a href="Attendance.php">Attendance</a></li><br>
        <li><a href="Result.php">Result</a></li><br>
    </ul>
    
    <a href="logout.php" id="logout">Logout</a>
</div>
