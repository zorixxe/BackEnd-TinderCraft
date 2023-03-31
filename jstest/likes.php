<?php
include "../handy_methods.php";

$sql = "SELECT * FROM profiles WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$_REQUEST['id']]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$likes = $result['likes'];
if ($_REQUEST['like'] == 'like') $likes++;
else if ($_REQUEST['like'] == 'dislike') $likes--;
else {
    echo "error";
    exit();
};
$sql = "UPDATE profiles SET likes = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$likes, $_REQUEST['id']]);

echo $likes; if($likes == 1 || $likes == -1) echo ' like'; else echo ' likes';

//Fråga dennis vad bästa sättet att setuppa om nån har likeat nån annat i mysql är.