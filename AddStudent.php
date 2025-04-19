<?php
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $student_id = $_POST["student_id"];

    if (strlen($password) < 4) {
        echo "<h3 style='color: red;'>Error: Password must be greater than 4 characters.</h3>";
    } else {
        $sql = "INSERT INTO students (name, email, password, student_id) VALUES (?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $password, $student_id);

            if (mysqli_stmt_execute($stmt)) {
                echo "<h3 style='color: green;'>Student added successfully!</h3>";
            } else {
                echo "<h3 style='color: red;'>Error: Could not add student. " . mysqli_stmt_error($stmt) . "</h3>";
            }

            mysqli_stmt_close($stmt);
        }
        mysqli_close($link);
    }
}
?>

<link rel="stylesheet" href="style.css">

<div class="container">

    <h1>Add Student</h1>
    
    <form method="post">
        <label>Name:</label><br>
        <input type="text" name="name" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Password:</label><br>
        <input type="text" name="password" required><br><br>

        <label>Student ID (e.g., 24CEUOZ105):</label><br>
        <input type="text" name="student_id" required><br><br>
        
        <div class="action">
            <input type="submit" value="Add Student" id="add">
            <a href=index.php id="back">Back</a>
        </div>
    </form>
</div>