<?php
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_string_id = $_POST["student_id"];
    $subject = "EVS";
    $Total_Marks = $_POST["Total_Marks"];
    $Obtained_Marks = $_POST["Obtained_Marks"];

    if ($Obtained_Marks > $Total_Marks) {
        echo "<h3 style='color: red;'>Error: Obtained Marks cannot exceed the Total marks.</h3>";
    }
    else if ($Total_Marks > 100) {
        echo "<h3 style='color: red;'>Error: Total Marks cannot exceed the 100 Marks.</h3>";
    }
    else {
        $lookup_sql = "SELECT student_id FROM students WHERE student_id = ?";
        if ($lookup_stmt = mysqli_prepare($link, $lookup_sql)) {
            mysqli_stmt_bind_param($lookup_stmt, "s", $student_string_id);
            mysqli_stmt_execute($lookup_stmt);
            mysqli_stmt_store_result($lookup_stmt);

            if (mysqli_stmt_num_rows($lookup_stmt) >= 0) {
                mysqli_stmt_close($lookup_stmt);

                $check_sql = "SELECT id, Total_Marks, Obtained_Marks FROM grades WHERE student_id = ? AND subject = ?";
                if ($check_stmt = mysqli_prepare($link, $check_sql)) {
                    mysqli_stmt_bind_param($check_stmt, "ss", $student_string_id, $subject);
                    mysqli_stmt_execute($check_stmt);
                    mysqli_stmt_store_result($check_stmt);

                    if (mysqli_stmt_num_rows($check_stmt) > 0) {
                        mysqli_stmt_bind_result($check_stmt, $grades_id, $current_total_Marks, $current_Obtained);

                        while (mysqli_stmt_fetch($check_stmt)) {
                            if ($current_total_Marks == $Total_Marks && $current_Obtained == $Obtained_Marks) {
                                echo "<h3 style='color: blue;'>Warning: Entered Grades is already the same as the latest record.</h3>";
                            } else {
                                $update_sql = "UPDATE grades SET Total_Marks = ?, Obtained_Marks = ? WHERE id = ?";
                                if ($update_stmt = mysqli_prepare($link, $update_sql)) {
                                    mysqli_stmt_bind_param($update_stmt, "iii", $Total_Marks, $Obtained_Marks, $grades_id);

                                    if (mysqli_stmt_execute($update_stmt)) {
                                        echo "<h3 style='color: green;'>Student's Grades updated successfully!</h3>";
                                    } else {
                                        echo "<h3 style='color: red;'>Error: Could not Update Student's Grades. " . mysqli_stmt_error($update_stmt) . "</h3>";
                                    }

                                    mysqli_stmt_close($update_stmt);
                                }
                            }
                        }
                    } else {
                        echo "<h3 style='color: red;'>No Grades record found for this student in the specified subject. Please insert it first.</h3>";
                    }

                    mysqli_stmt_close($check_stmt);
                }
            } else {
                echo "<h3 style='color: red;'>Student ID not found. Please enter a valid student ID.</h3>";
            }
        }
    }

    mysqli_close($link);
}
?>

<link rel="stylesheet" href="style.css">

<div class="container">

    <h1>Update EVS's Grade</h1>
    
    <form method="post">
        
        <label>Student ID (of the student to update):</label><br>
        <input type="text" name="student_id" required><br><br>

        <label>Total_Marks Marks:</label><br>
        <input type="number" name="Total_Marks" min="0" required><br><br>

        <label>Obtained Marks:</label><br>
        <input type="number" name="Obtained_Marks" min="0" required><br><br>
        
        <div class="action">
            <input type="submit" value="Update" id="add">
            <a href=UpdateGrade.php id="back">Back</a>
        </div>
    </form>
</div>