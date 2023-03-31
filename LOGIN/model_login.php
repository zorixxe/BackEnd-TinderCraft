<?php

// Kolla om man fyllt i loginformuläret
if (!empty($_REQUEST['username']) && !empty($_REQUEST['pass'])) {
    // Köra input genom XSS protection
    $user = test_input($_REQUEST['username']);
    $pass = test_input($_REQUEST['pass']);

    // Formulera SQL statement
    //  $sql = "SELECT username,password FROM profiles WHERE username=? AND password=?";
    $sql = "SELECT id,username,password FROM profiles WHERE username=?";

    // Skydd för SQL injection (prepared statement!)
    $stmt = $conn->prepare($sql);


    // execute() returnerar FALSE on failure
    $stmt->execute([$user]);
    // Prepare, bind_param och execute returnar alla bara true eller false.
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result && password_verify($pass, $result['password'])) {
        $_SESSION["username"] = $user;
        $_SESSION['receiverID'] = $result['id'];

        //Ifall login har skett successfully, redirecta till home
        echo "<p class='float'>Log in successful!</p> <meta http-equiv='refresh' content='0, url=$url'>"; //url definierad i view php fil eftersom model_login kan användas många gånger då
    }
    // Om lyckad login, spara användarnamn i sessionsvariabel

    else {
        echo "<p class='float'>Wrong username or password.</p>";
    }
}
