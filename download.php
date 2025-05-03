<?php
require_once "config.php";
$subject = $_GET["subject"];
if($subject=="All")
    $sql = "SELECT * FROM material ";
else
    $sql = "SELECT * FROM material WHERE subject = '$subject' ";
if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        echo '<table>';
        echo "<thead>";
        echo "<tr>";
        echo "<th>File Name</th>";
        echo "<th>Action</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['file_path'] . "</td>";
            echo "<td>";
			echo "<a href='download2.php?path=" . $row['file_path'] . "'>Download</a>";
            echo "&nbsp;";
            echo "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        mysqli_free_result($result);
    } else {
        echo '<em>No records were found.</em>';
    }
} else {
    echo "Oops! Something went wrong. Please try again later.";
}
!
mysqli_close($link);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Material</title>
    <link rel="stylesheet" href="Style.css">
</head>
<body>
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
    text-decoration: none;
    background-color: black;
    color: white;
    padding: 10px 10px;
    border-radius: 6px;
    width: 120px;
    margin-left: auto;
    margin-right: auto;
    transition: 0.3s ease;
}

.action{
    justify-self: center;
    align-self: center;
}
#back{
    width: 150px;
}
a:hover {
    background-color: #333;
}
</style>
</body>
</html>
<br><br>
<div class="action">
<a href="DownloadPage.php" id="back">Back</a>
</div>