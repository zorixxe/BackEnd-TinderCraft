<?php
$sql = "SELECT * FROM profiles WHERE username = ?";
$stmt = $conn->prepare($sql);

$username = $_SESSION['username'];

if (!empty($_REQUEST['bioChange'])) {
    $bioChange = test_input($_REQUEST['bioChange']);
    $sql = "UPDATE profiles SET bio = ? WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$bioChange, $username]);
    print("<p>Bio uppdaterad!</p>");
} else
    try {
        $stmt->execute([$username]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print("<p>Error: " . $e->getMessage() . "</p>");
    }
