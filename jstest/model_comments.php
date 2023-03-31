<?php

if($_SESSION['profile']) $profile = $_SESSION['profile'];
$username = $_SESSION['username'];
$receiverID = $_SESSION['receiverID'];

if(!empty($_REQUEST["comment"])){
    $comment = test_input($_REQUEST["comment"]);

    $sql = "INSERT INTO comments (message, receiver, sender) VALUES (?, (SELECT id FROM profiles WHERE username = ?), ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$comment, $profile, $receiverID]);
    $url = "./jstest.php?profile=$profile";
    echo "<meta http-equiv='refresh' content='0, url=$url'>";
    exit();
} 

if(empty($_REQUEST['profile'])) $profile = $_SESSION['username'];

$sql = "SELECT comments.message, profiles.username, comments.date FROM comments INNER JOIN profiles ON comments.sender=profiles.id WHERE receiver = (SELECT id FROM profiles WHERE username = ?) ORDER BY date DESC";
                $stmt =  $conn->prepare($sql);
                $stmt->execute([$profile]);
