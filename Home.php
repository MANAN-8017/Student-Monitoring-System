<?php
session_start();
if ($_SESSION['role'] !== 'faculty') {
    header("Location: login.php");
    exit();
}
?>

<link rel="stylesheet" href="style.css">

<div class="container">
    <h1>Welcome <?php echo $_SESSION['name']; ?>,</h1>
    
    <form action="logout.php">
        <ul>
            <li><a href="index.php" style="margin-top:50px;">Manage Data (Add/Update/Delete)</a></li><br>
            <li><a href="view.php">View All Records</a></li><br>
        </ul>
        
        <input type="submit" id="flogout" value="Logout">
    </form>
</div>