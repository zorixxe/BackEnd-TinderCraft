<?php

$user = $_SESSION['username'];

// Check if image file is a actual image or fake image
if (!empty($_REQUEST["image"])) {
    $target_file = file_get_contents($_FILES["fileToUpload"]["tmp_name"]);

    $uploadOk = 1;
    $check = exif_imagetype($_FILES["fileToUpload"]["tmp_name"]);

    if ($check == 2 || $check == 3) {
        $uploadOk = 1;
    } else {
        echo "<p>Sorry, only JPG, JPEG and PNG allowed.<br></p>";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        if ($uploadOk != 0) {
            echo "<p>Sorry, your file is too large. <br></p>";
            $uploadOk = 0;
        };
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "<p>Sorry, your file was not uploaded. <br></p>";
        // if everything is ok, try to upload file
    } else {
        $sql = "UPDATE profiles SET picture = ? WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$target_file, $user]);

        echo "<p>Profile picture successfully updated! Refreshing...</p>";
        $url = "./profile.php";
        echo "<meta http-equiv='refresh' content='2, url=$url'>";
    }
}
