<link rel="stylesheet" href="style.css">

<div class="container">

    <h1>Update Student's Grade,</h1>

    <form method="post">
    <div class="home">
            <div class="maths">
                <a href="UpdateMathsGrade.php"><img src="maths.png" alt="maths Icon"></a>
            </div>
            
            <div class="scp">
                <a href="UpdateSCPGrade.php"><img src="scp.png" alt="scp Icon"></a>
            </div>

            <div class="pps">
                <a href="UpdatePPSGrade.php"><img src="pps.png" alt="pps Icon"></a>
            </div>
        </div>
        <div class="home">
            
        <div class="hw">
                <a href="UpdateHWGrade.php"><img src="hw.png" alt="hw Icon"></a>
            </div>

            <div class="english">
                <a href="UpdateEnglishGrade.php"><img src="english.png" alt="english Icon"></a>
            </div>

            <div class="evs">
                <a href="UpdateEVSGrade.php"><img src="evs.png" alt="evs Icon"></a>
            </div>
        </div>
        <!-- <ul>
            <li><a href="UpdateMathsGrade.php">Mathematics-II</a></li><br>
            <li><a href="UpdateSCPGrade.php">Semiconductor Physics</a></li><br>
            <li><a href="UpdatePPSGrade.php">PPS-II</a></li><br>
            <li><a href="UpdateHWGrade.php">Hardware Workshop</a></li><br>
            <li><a href="UpdateEnglishGrade.php">English</a></li><br>
            <li><a href="UpdateEVSGrade.php">EVS</a></li><br>
        </ul> -->
        <div class="action">
            <a href=index.php id="back">Back</a>
        </div>
    </form>
</div>
<style>
    .home {
        display: flex;
        padding-left: 40px;
        padding-right: 40px;
        padding-bottom: 15px;
        gap: 10px;
    }
    .maths img, .scp img, .pps img, .hw img ,.english img,.evs img{
        width: 100px;
        height: 100px;
        object-fit: contain;
        margin-bottom: 10px;
        display: inline;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }
</style>