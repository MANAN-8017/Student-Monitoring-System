<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
    padding: 20px;
    color: #333;
}

h1 {
    color: #1d5d5f;
    text-align: center;
    margin-bottom: 30px;
}

table {
    width: 90%;
    margin: 0 auto;
    border-collapse: collapse;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    border-radius: 10px;
    overflow: hidden;
}

table th, table td {
    padding: 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

thead {
    background-color: #1d5d5f;
    color: white;
}

tbody tr:hover {
    background-color: #f1f1f1;
}

a {
    display: block;
    text-align: center;
    margin-top: 30px;
    text-decoration: none;
    background-color: black;
    color: white;
    padding: 10px 20px;
    border-radius: 6px;
    width: 120px;
    margin-left: auto;
    margin-right: auto;
    transition: 0.3s ease;
}

a:hover {
    background-color: #333;
}
</style>
<?php
require_once "config.php";
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'faculty') {
    header("Location: login.php");
    exit();
}

$sql = "SELECT * FROM students";
if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        echo "<h1>Student Records</h1>";
        echo '<table>';
        echo "<thead>";
        echo "<tr>";
        echo "<th>Id</th>";
        echo "<th></th>";
        echo "<th></th>";
        echo "<th>Student Id</th>";
        echo "<th></th>";
        echo "<th></th>";
        echo "<th>Name</th>";
        echo "<th></th>";
        echo "<th></th>";
        echo "<th>Email</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<th></th>";
            echo "<th></th>";
            echo "<td>" . $row['student_id'] . "</td>";
            echo "<th></th>";
            echo "<th></th>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<th></th>";
            echo "<th></th>";
            echo "<td>" . $row['email'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        mysqli_free_result($result);
    } else {
        echo "<p>No student records found.</p>";
    }
} else {
    echo "Error: " . mysqli_error($link);
}

mysqli_close($link);
?>
<br><br>
<a href="Home.php" id="flogout">Back</a>