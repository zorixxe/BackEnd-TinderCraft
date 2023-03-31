<h2>Enter password to change all settings</h2>

<div class="form">
    <form action="profile.php" method="GET">
        <input type="password" name="pass" placeholder="Password"><br>
        <input type="submit" value="Change info">
    </form>
</div>

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
        $url = "../UPDATE_ACCOUNT/update.php";
        echo "<meta http-equiv='refresh' content='0, url=$url'>";
    } else {
        print("<p>Wrong password.</p>");
    }
}