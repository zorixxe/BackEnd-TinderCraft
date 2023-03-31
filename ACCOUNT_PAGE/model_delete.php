<?php
$user = $_SESSION['username'];

// Kolla om man fyllt i loginformuläret
if (!empty($_REQUEST['pass'])) {
    // Köra input genom XSS protection
    $pass = test_input($_REQUEST['pass']);

    // Formulera SQL statement
    $sql = "SELECT * FROM profiles WHERE username=?";

    // Skydd för SQL injection (prepared statement!)
    $stmt = $conn->prepare($sql);


    $stmt->execute([$user]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result && password_verify($pass, $result['password'])) {
        
        $_SESSION["username"] = '';

        $sql = "DELETE FROM profiles WHERE username=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$user]);

        echo "<p>Nice having you! Redirect in 5... <meta http-equiv='refresh' content='5, url=../'> </p>";
    }

    else {
        print("<p>Wrong password. </p>");
    }
}
