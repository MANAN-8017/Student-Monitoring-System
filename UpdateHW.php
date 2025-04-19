<?php
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_string_id = $_POST["student_id"];
    $subject = "HW";
    $Total = $_POST["Total"];
    $Present = $_POST["Present"];

    if ($Present > $Total) {
        echo "<h3 style='color: red;'>Error: Present days cannot be more than Total days.</h3>";
        exit();
    }
    
    $lookup_sql = "SELECT id FROM students WHERE student_id = ?";
    if ($lookup_stmt = mysqli_prepare($link, $lookup_sql)) {
        mysqli_stmt_bind_param($lookup_stmt, "s", $student_string_id);
        mysqli_stmt_execute($lookup_stmt);
        mysqli_stmt_bind_result($lookup_stmt, $student_id_int);

        if (mysqli_stmt_fetch($lookup_stmt)) {
            mysqli_stmt_close($lookup_stmt);

            $check_sql = "SELECT * FROM attendance WHERE student_id = ? AND subject = ?";
            if ($check_stmt = mysqli_prepare($link, $check_sql)) {
                mysqli_stmt_bind_param($check_stmt, "is", $student_id_int, $subject);
                mysqli_stmt_execute($check_stmt);
                mysqli_stmt_store_result($check_stmt);

                if (mysqli_stmt_num_rows($check_stmt) > 0) {
                    $update_sql = "UPDATE attendance SET Total = ?, Present = ? WHERE student_id = ? AND subject = ?";
                    if ($update_stmt = mysqli_prepare($link, $update_sql)) {
                        mysqli_stmt_bind_param($update_stmt, "iiis", $Total, $Present, $student_id_int, $subject);

                        if (mysqli_stmt_execute($update_stmt)) {
                            echo "<h3 style='color: green;'>Student attendance updated successfully!</h3>";
                        } else {
                            echo "<h3 style='color: red;'>Error: Could not update attendance. " . mysqli_stmt_error($update_stmt) . "</h3>";
                        }

                        mysqli_stmt_close($update_stmt);
                    }
                } else {
                    echo "<h3 style='color: red;'>No attendance record found for this student. Please insert it first.</h3>";
                }

                mysqli_stmt_close($check_stmt);
            }

        } else {
            echo "<h3 style='color: red;'>Student ID not found. Please enter a valid student ID.</h3>";
        }
    }

    mysqli_close($link);
}
?>

<link rel="stylesheet" href="style.css">

<div class="container">

    <h1>Update HW's attendance</h1>
    
    <form method="post">
        
        <label>Student ID (of the student to update):</label><br>
        <input type="text" name="student_id" required><br><br>

        <label>Total:</label><br>
        <input type="number" name="Total" min="0" required><br><br>

        <label>Present:</label><br>
        <input type="number" name="Present" min="0" required><br><br>
        
        <div class="action">
            <input type="submit" value="Update" id="add">
            <a href=UpdateAttendance.php id="back">Back</a>
        </div>
    </form>
</div>