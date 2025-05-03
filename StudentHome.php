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

    <style>
        .home {
            display: flex;
            padding-left: 40px;
            padding-right: 40px;
            padding-bottom: 15px;
            gap: 10px;
        }
        .attendance img, .results img , .materials img {
            width: 100px;
            height: 100px;
            object-fit: contain;
            margin-bottom: 10px;
            display: inline;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
    
    </style>

<div class="container">
    <h1 style="color:#1d5d5f">Welcome <?php echo $_SESSION['name']; ?>,</h1>
    
    <div class="home">
    <div class="attendance">
        <a href="Attendance.php"><img src="a.png" alt="Attendance Icon"></a>
    </div>
    
    <div class="materials">
        <a href="downloadPage.php"><img src="m.jpg.png" alt="Results Icon"></a>
    </div>

    <div class="results">
        <a href="Result.php"><img src="result.png" alt="Results Icon"></a>
    </div>
    </div>

    <a href="logout.php" id="logout">Logout</a>
</div>