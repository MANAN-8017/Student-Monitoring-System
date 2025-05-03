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

    <h1>Insert Student's Grade,</h1>

    <form method="post">

    <div class="home">
            <div class="maths">
                <a href="MathsGrade.php"><img src="maths.png" alt="maths Icon"></a>
            </div>
            
            <div class="scp">
                <a href="SCPGrade.php"><img src="scp.png" alt="scp Icon"></a>
            </div>

            <div class="pps">
                <a href="PPSGrade.php"><img src="pps.png" alt="pps Icon"></a>
            </div>
        </div>
        <div class="home">
            
        <div class="hw">
                <a href="HWGrade.php"><img src="hw.png" alt="hw Icon"></a>
            </div>

            <div class="english">
                <a href="EnglishGrade.php"><img src="english.png" alt="english Icon"></a>
            </div>

            <div class="evs">
                <a href="EVSGrade.php"><img src="evs.png" alt="evs Icon"></a>
            </div>
        </div>
        <div class="action">
            <a href=index.php id="back">Back</a>
        </div>
    </form>
</div>
<style>
    .home {
        display: flex;
        padding-left: 40px;
        padding-right: 40px;
        padding-bottom: 15px;
        gap: 10px;
    }
    .maths img, .scp img, .pps img, .hw img ,.english img,.evs img{
        width: 100px;
        height: 100px;
        object-fit: contain;
        margin-bottom: 10px;
        display: inline;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }
</style>