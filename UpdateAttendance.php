<link rel="stylesheet" href="style.css">

<div class="container">

    <h1>Update Student's Attendance,</h1>

    <form method="post">
    <div class="home">
            <div class="maths">
                <a href="UpdateMaths.php"><img src="maths.png" alt="maths Icon"></a>
            </div>
            
            <div class="scp">
                <a href="UpdateSCP.php"><img src="scp.png" alt="scp Icon"></a>
            </div>

            <div class="pps">
                <a href="UpdatePPS.php"><img src="pps.png" alt="pps Icon"></a>
            </div>
        </div>
        <div class="home">
            
        <div class="hw">
                <a href="UpdateHW.php"><img src="hw.png" alt="hw Icon"></a>
            </div>

            <div class="english">
                <a href="UpdateEnglish.php"><img src="english.png" alt="english Icon"></a>
            </div>

            <div class="evs">
                <a href="UpdateEVS.php"><img src="evs.png" alt="evs Icon"></a>
            </div>
        </div>
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