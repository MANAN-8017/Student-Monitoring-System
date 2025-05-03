<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style.css">
    <title>Document</title>
</head>
<body>
<div class="container">
    <form action="download.php" method="GET">
    
    <h1>Download Material</h1>
    <div class="select">
    <label>Subject:</label>
        <select name="subject" id="subject">
            <option value="All">All</option>
            <option value="PPS">PPS</option>
            <option value="SCP">SCP</option>
            <option value="HW">HW</option>
            <option value="ENGLISH">ENGLISH</option>
            <option value="EVS">EVS</option>
        </select><br><br>
    </div>
        <div class="action">
        <input type="submit" name="submit" value="View">
        <a href="StudentHome.php" id="back">Back</a>
        </div>
    </form>

</div>
</body>
<style>
    .select{
        display: ;
        margin-top: 40px;
        margin-bottom: 20px;
    }
    #subject{
        font-size: 15px;
        width: 100px;
        text-align: center;
        
    }
    label{
        padding: 50px;
        font-size: 19px;
        margin-right:10px;
    }
</style>
</html>