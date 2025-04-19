<?php
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST["student_id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "UPDATE students SET name = ?, email = ?, password = ? WHERE student_id = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $password, $student_id);

        if (mysqli_stmt_execute($stmt)) {
            echo "<h3 style='color: green;'>Student's Attendance Inserted successfully!</h3>";
        } else {
            echo "<h3 style='color: red;'>Error: Could not Insert Student's Attendance. " . mysqli_stmt_error($stmt) . "</h3>";
        }

        mysqli_stmt_close($stmt);
    }
    mysqli_close($link);
}
?>

<link rel="stylesheet" href="style.css">

<div class="container">

    <h1>Insert Student's Attendance,</h1>

    <form method="post">
        <ul>
            <li><a href="Maths.php">Mathematics-II</a></li><br>
            <li><a href="SCP.php">Semiconductor Physics</a></li><br>
            <li><a href="PPS.php">PPS-II</a></li><br>
            <li><a href="HW.php">Hardware Workshop</a></li><br>
            <li><a href="English.php">English</a></li><br>
            <li><a href="EVS.php">EVS</a></li><br>
        </ul>
        <div class="action">
            <a href=index.php id="back">Back</a>
        </div>
    </form>
</div>