<?php
require_once "config.php";
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'faculty') {
    header("Location: login.php");
    exit();
}
?>

<link rel="stylesheet" href="Style.css">

<div class="container">
    <form method="post" action="Home.php">
        <h1>Faculty Dashboard - Manage Student's Data</h1>

        <div class="home">
            <div class="add">
                <a href="AddStudent.php"><img src="add.png" alt="add Icon"></a>
            </div>
            
            <div class="update">
                <a href="UpdateStudent.php"><img src="UpdateStudent.png" alt="update Icon"></a>
            </div>

            <div class="delete">
                <a href="DeleteStudent.php"><img src="deletestudents.png" alt="selete Icon"></a>
            </div>
        </div>
        <div class="home">
            
        <div class="insert_att">
                <a href="InsertAttendance.php"><img src="insertattendanceStudent.png" alt="attendace insert Icon"></a>
            </div>

            <div class="update_att">
                <a href="UpdateAttendance.php"><img src="UpdateattendanceStudent.png" alt="update attendance Icon"></a>
            </div>

            <div class="insert_grade">
                <a href="InsertGrade.php"><img src="insert_marks.png" alt="insert marks Icon"></a>
            </div>
        </div>
        <div class="home">
            
        <div class="update_grade">
                <a href="UpdateGrade.php"><img src="update_marks.png" alt="update marks Icon"></a>
            </div>

            <div class="upload_materials">
                <a href="uploadMaterial.php"><img src="m.jpg.png" alt="update marks Icon"></a>
            </div>
        </div>
        <input type="submit" value="Back" id="flogout"></a>
    </form>
</div>
<style>
    /* .container{
        height: 400px;
    } */
    .home {
        display: flex;
        padding-left: 40px;
        padding-right: 40px;
        padding-bottom: 15px;
        gap: 10px;
    }
    .update img, .add img, .delete img, .insert_att img ,.update_att img,.insert_grade img, .update_grade img,.upload_materials img {
        width: 100px;
        height: 100px;
        object-fit: contain;
        margin-bottom: 10px;
        display: inline;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }
</style>