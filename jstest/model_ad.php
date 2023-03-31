<?php
$sql = "SELECT * from profiles where username = ?";
$stmt = $conn->prepare($sql);
$stmt -> execute([$_REQUEST['profile']]);
$result = $stmt -> fetch(PDO::FETCH_ASSOC);
?>