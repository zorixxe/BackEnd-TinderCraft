<?php
// Start the session
session_start();
// Allt möjligt viktigt som vi använder ofta, sessionshantering, form validation etc.

// En funktion som tar bort whitespace, backslashes (escape char) och gör om < till html safe motsvarigheter
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Databaskonfiguration
$servername = "localhost";
include "hemlis.php";
// hemlis.php ser ut såhär:
// <?php $password = "sup3rh3mlis";

// Create connection
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=UTF8", $username, $password);
  // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }


