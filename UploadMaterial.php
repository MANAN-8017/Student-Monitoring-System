<?php
include "config.php";

if (isset($_POST["submit"])) {
    $target_dir = "Uploaded/";
    $subject = $_POST['subject'];
    $i=0;
    $target_file = $target_dir . basename($_FILES['fileUpload']['name'][$i]);
    $imageExt = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $allowd_file_ext = array("jpg", "jpeg", "png", "pdf", "php");

    $countfiles = count($_FILES["fileUpload"]["name"]);
	for($i=0;$i<$countfiles;$i++){
		$target_dir = "Uploaded/";
		$target_file = $target_dir . basename($_FILES["fileUpload"]["name"][$i]);
		
        if (!file_exists($_FILES["fileUpload"]["tmp_name"][$i])) {
            $resMessage = array(
                "message" => "<h3 style='color: red;'>Select file(s) to upload.</h3>",
            );
        } else if (!in_array($imageExt, $allowd_file_ext)) {
            $resMessage = array(
                "message" => "<h3 style='color: red;'>Allowed file formats: .jpg, .jpeg, .pdf, .png.</h3>",
            );
        } else if ($_FILES["fileUpload"]["size"][$i] > 200000000) {
            $resMessage = array(
                "message" => "<h3 style='color: red;'>File is too large. File size should be less than 200MB.</h3>",
            );
        } else if (file_exists($target_file) ) {
            $resMessage = array(
                "message" => "<h3 style='color: blue;'>File already exists.</h3>",
            );
        }
		else if(move_uploaded_file($_FILES['fileUpload']['tmp_name'][$i],$target_file))
		{
			$sql = "INSERT INTO material (file_path, subject) VALUES (?, ?)";
            $stmt = mysqli_prepare($link, $sql);
			mysqli_stmt_bind_param($stmt, "ss", $param_path, $param_subject);
			$param_path = $target_file;
            $param_subject = $subject;
            if (mysqli_stmt_execute($stmt)) {
                $resMessage = array(
                    "message" => "<h3 style='color: green;'>Files uploaded successfully.</h3>",
                );
            }
        } else {
            $resMessage = array(
                "message" => "<h3 style='color: red;'>File(s) couldn't be uploaded.</h3>",
            );
        }
			
	}
}
?>

<?php 
if (!empty($resMessage)) {
    echo "<div style='margin: 20px; color: green; font-weight: bold;'>" . $resMessage['message'] . "</div>";
}
?>

<link rel="stylesheet" href="Style.css">

<div class="container">
    
    <h1>Upload Material</h1>
    
    <form action="" method="post" enctype="multipart/form-data">
        <label>Subject:</label><br><br>
        <select name="subject" id="subject">
            <option value="PPS">PPS</option>
            <option value="SCP">SCP</option>
            <option value="HW">HW</option>
            <option value="ENGLISH">ENGLISH</option>
            <option value="EVS">EVS</option>
        </select><br><br>
        
        <input type="file" name="fileUpload[]" id="chooseFile" multiple>

        <div class="action">
            <input type="submit" name="submit" value="Upload File" id="add">
            <a href=index.php id="back">Back</a>
        </div>
    </form>
</div>