<?php
session_start();
if ($_SESSION['role'] !== 'faculty') {
    header("Location: login.php");
    exit();
}
?>

<link rel="stylesheet" href="style.css">

<div class="container">
    <h1>Welcome Prof. <?php echo $_SESSION['name']; ?>,</h1>
    
    <form action="logout.php">
    <div class="home">
    <div class="manage">
        <a href="index.php"><img src="manage.png" alt="manage Icon"></a>
    </div>

    <div class="view">
        <a href="view.php"><img src="view.png" alt="view Icon"></a>
    </div>
    </div>
        
        <input type="submit" id="flogout" value="Logout">
    </form>
</div>
<style>
    .home {
        display: flex;
        padding-left: 95px;
        padding-right: 95px;
        padding-bottom: 15px;
        gap: 10px;
    }
    .view img, .manage img {
        width: 100px;
        height: 100px;
        object-fit: contain;
        margin-bottom: 10px;
        display: inline;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }
</style>