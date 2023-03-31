<h2>Update profile pic!</h2>

<form action="profile.php" method="post" enctype="multipart/form-data">
    <input type="file" name="fileToUpload">
    <input type="submit" name="image" value="Upload">
</form>

<?php
include "upload_pic.php";

$sql = "SELECT * from profiles where username = ?";
$stmt = $conn->prepare($sql);
$stmt -> execute([$_SESSION['username']]);
$result = $stmt -> fetch(PDO::FETCH_ASSOC);
$pic = $result['picture'];
?>
<img id="profilePic" src="<?php if($pic == null) echo '../media/pexels-pixabay-220453.jpg'; else echo "data:image/jpeg;base64,". base64_encode($pic);?>" alt='profilepic'>