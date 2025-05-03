<?php
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST["student_id"];
    $subject = "English";
    $Total_Marks = $_POST["Total_Marks"];
    $Obtained_Marks = $_POST["Obtained_Marks"];

    if ($Obtained_Marks > $Total_Marks) {
        echo "<h3 style='color: red;'>Error: Obtained Marks cannot exceed the Total marks.</h3>";
    }
    else if ($Total_Marks > 100) {
        echo "<h3 style='color: red;'>Error: Total Marks cannot exceed the 100 Marks.</h3>";
    } 
    else {
        $lookup_sql = "SELECT student_id FROM grades WHERE student_id = ?";
        if ($lookup_stmt = mysqli_prepare($link, $lookup_sql)) {
            mysqli_stmt_bind_param($lookup_stmt, "s", $student_id);
            mysqli_stmt_execute($lookup_stmt);
            mysqli_stmt_store_result($lookup_stmt);

            if (mysqli_stmt_num_rows($lookup_stmt) >= 0) {
                mysqli_stmt_close($lookup_stmt);

                $check_sql = "SELECT * FROM grades WHERE student_id = ? AND subject = ?";
                if ($check_stmt = mysqli_prepare($link, $check_sql)) {
                    mysqli_stmt_bind_param($check_stmt, "ss", $student_id, $subject);
                    mysqli_stmt_execute($check_stmt);
                    mysqli_stmt_store_result($check_stmt);

                    if (mysqli_stmt_num_rows($check_stmt) > 0) {
                        echo "<h3 style='color: red;'>Student's Grades already recorded for this subject. Please update it instead.</h3>";
                    } else {
                        $insert_sql = "INSERT INTO grades (student_id, subject, Total_Marks, Obtained_Marks) VALUES (?, ?, ?, ?)";
                        if ($insert_stmt = mysqli_prepare($link, $insert_sql)) {
                            mysqli_stmt_bind_param($insert_stmt, "ssii", $student_id, $subject, $Total_Marks, $Obtained_Marks);

                            if (mysqli_stmt_execute($insert_stmt)) {
                                echo "<h3 style='color: green;'>Student's Grades Inserted Successfully!</h3>";
                            } else {
                                echo "<h3 style='color: red;'>Error: Could not Insert Student's Grades. " . mysqli_stmt_error($insert_stmt) . "</h3>";
                            }

                            mysqli_stmt_close($insert_stmt);
                        }
                    }

                    mysqli_stmt_close($check_stmt);
                }
            } else {
                echo "<h3 style='color: red;'>Student's ID not found. Please enter a valid Student's ID.</h3>";
            }
        }
    }

    mysqli_close($link);
}
?>

<link rel="stylesheet" href="style.css">

<div class="container">

    <h1>Insert English's Grade</h1>
    
    <form method="post">
        
        <label>Student's ID (of the student to Insert):</label><br>
        <input type="text" name="student_id" required><br><br>

        <label>Total Marks:</label><br>
        <input type="number" name="Total Marks" min="0" required><br><br>

        <label>Obtained Marks:</label><br>
        <input type="number" name="Obtained Marks" min="0" required><br><br>
        
        <div class="action">
            <input type="submit" value="Insert" id="add">
            <a href=InsertGrade.php id="back">Back</a>
        </div>
    </form>
</div>