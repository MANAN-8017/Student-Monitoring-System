<?php
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST["student_id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (!preg_match("/^[a-zA-Z ]+$/", $name)) {
        echo "<h3 style='color: red;'>Error: Name must only contain letters and spaces.</h3>";
    }
    elseif (strlen($password) < 4) {
        echo "<h3 style='color: red;'>Error: Password must be at least 4 characters long.</h3>";
    }
    else {
        $sql = "SELECT * FROM students WHERE student_id = ?";
        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $student_id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) > 0) {
                $update_sql = "UPDATE students SET name = ?, email = ?, password = ? WHERE student_id = ?";
                if ($update_stmt = mysqli_prepare($link, $update_sql)) {
                    mysqli_stmt_bind_param($update_stmt, "ssss", $name, $email, $password, $student_id);

                    if (mysqli_stmt_execute($update_stmt)) {
                        echo "<h3 style='color: green;'>Student's Data Updated Successfully!</h3>";
                    } else {
                        echo "<h3 style='color: red;'>Error: Could not Update Student's Data.</h3>";
                    }

                    mysqli_stmt_close($update_stmt);
                }
            } else {
                echo "<h3 style='color: red;'>Error: No Student found with the provided Student ID.</h3>";
            }

            mysqli_stmt_close($stmt);
        }

        mysqli_close($link);
    }
}
?>


<link rel="stylesheet" href="style.css">

<div class="container">

    <h1>Update Student's Data</h1>

    <form method="post">

        <label>Student ID (of the student to update):</label><br>
        <input type="text" name="student_id" required><br><br>

        <label>New Name:</label><br>
        <input type="text" name="name" required><br><br>

        <label>New Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>New Password:</label><br>
        <input type="text" name="password" required><br><br>
        
        <div class="action">
            <input type="submit" value="Update Student" id="add">
            <a href=index.php id="back">Back</a>
        </div>
    </form>
</div>