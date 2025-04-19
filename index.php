<?php
require_once "config.php";
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'faculty') {
    header("Location: login.php");
    exit();
}
?>

<link rel="stylesheet" href="style.css">

<div class="container">
    <form method="post" action="Home.php">
        <h1>Faculty Dashboard - Manage Students & Attendance</h1>

        <ul>
            <li><a href="AddStudent.php">Add Student</a></li><br>
            <li><a href="UpdateStudent.php">Update Student</a></li><br>
            <li><a href="DeleteStudent.php">Delete Student</a></li><br>
            <li><a href="InsertAttendance.php">Insert Attendance</a></li><br>
            <li><a href="UpdateAttendance.php">Update Attendance</a></li><br>
        </ul>

        <input type="submit" value="Back" id="flogout"></a>
    </form>
</div>