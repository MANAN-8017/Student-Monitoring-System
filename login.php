<?php
session_start();
require_once "config.php";

if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'faculty') {
        header("Location: Home.php");
    } else {
        header("Location: StudentHome.php");
    }
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = $_POST['pwd'];
    $role = $_POST['role'];

    $table = ($role == 'student') ? 'students' : 'faculties';

    $sql = "SELECT * FROM $table WHERE email = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);
            
            if (password_verify($password, $user['password']) || $password === $user['password']) {
                $_SESSION['id'] = $user['id'];
                $_SESSION['student_id'] = ($role == 'student') ? $user['student_id'] : null;
                $_SESSION['name'] = $user['name'];
                $_SESSION['role'] = $role;

                if ($role == 'faculty') {
                    header("Location: Home.php");
                } else {
                    header("Location: StudentHome.php");
                }
                exit();
            } else {
                $error_msg = "Invalid password.";
            }
        } else {
            $error_msg = "No user found with that email.";
        }
        mysqli_stmt_close($stmt);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Student Attendance & Grade Management System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 400px;
            margin: 50px auto;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        input[type="email"], input[type="password"], select {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .error-message {
            color: #ff0000;
            text-align: center;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Student Monitoring System</h1>
    
    <?php if (isset($error_msg)): ?>
        <p class="error-message"><?php echo $error_msg; ?></p>
    <?php endif; ?>
    
    <form method="post" action="">
        <label for="role">Login as:</label>
        <select name="role" required>
            <option value="faculty" <?php echo (isset($_POST['role']) && $_POST['role'] == 'faculty') ? 'selected' : ''; ?>>Faculty</option>
            <option value="student" <?php echo (isset($_POST['role']) && $_POST['role'] == 'student') ? 'selected' : ''; ?>>Student</option>
        </select>

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" required>

        <label for="pwd">Password:</label>
        <input type="password" name="pwd" required>

        <input type="submit" value="Login">
    </form>
</div>

</body>
</html>