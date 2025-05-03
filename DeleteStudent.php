<?php
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST["student_id"];

    $sql = "SELECT * FROM students WHERE student_id = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "s", $student_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            $delete_sql = "DELETE FROM students WHERE student_id = ?";
            if ($delete_stmt = mysqli_prepare($link, $delete_sql)) {
                mysqli_stmt_bind_param($delete_stmt, "s", $student_id);

                if (mysqli_stmt_execute($delete_stmt)) {
                    echo "<h3 style='color: green;'>Student's Data Deleted Successfully!</h3>";
                } else {
                    echo "<h3 style='color: red;'>Error: Could not delete Student's Data. " . mysqli_stmt_error($delete_stmt) . "</h3>";
                }

                mysqli_stmt_close($delete_stmt);
            }
        } else {
            echo "<h3 style='color: red;'>Error: No Student found with the provided Student ID.</h3>";
        }

        mysqli_stmt_close($stmt);
    }

    mysqli_close($link);
}
?>

<link rel="stylesheet" href="style.css">

<div class="container">

    <h1>Delete Student's Data</h1>

    <form method="post">

        <label>Student ID (of the student to delete):</label><br>
        <input type="text" name="student_id" required><br><br>
        
        <div class="action">
            <input type="submit" value="Delete Student" id="add" onclick="return confirm('Are you sure you want to delete this student?');">
            <a href=index.php id="back">Back</a>
        </div>
    </form>
</div>