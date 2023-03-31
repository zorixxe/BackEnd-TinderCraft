<?php

if (!empty($_REQUEST["submit"])) {

  $username = test_input($_REQUEST['username']);
  $password = test_input($_REQUEST['password']);
  $password = password_hash($password, PASSWORD_DEFAULT);
  $realName = test_input($_REQUEST['realName']);
  $email = test_input($_REQUEST['email']);
  $zipcode = test_input($_REQUEST['zipcode']);
  $bio = test_input($_REQUEST['bio']);
  $salary = test_input($_REQUEST['salary']);
  $preferences = test_input($_REQUEST['preferences']);


  //Checkar ifall username existerar i databasen
  $sql = "SELECT COUNT(*) FROM profiles WHERE username = ?";

  $stmt = $conn->prepare($sql);
  $stmt->execute([$username]);
  if ($stmt->fetchColumn() > 0) {
    echo "<p>Username already exists.</p>";
  } else {
    //Insert in i databasen
    $sql = "INSERT INTO profiles (username, password, realname, email, zipcode, bio, salary, preference) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $result = $stmt->execute([$username, $password, $realName, $email, $zipcode, $bio, $salary, $preferences]);

    if ($result) {
      $_SESSION['username'] = $username;
      $sql = "SELECT id FROM profiles WHERE username = ?";
      $stmt = $conn->prepare($sql);
      $stmt->execute([$username]);
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      $_SESSION['receiverID'] = $result['id'];
      
      $url = "../jstest/jstest.php";
      echo "<p>Profile created successfully! Redirecting...</p> <meta http-equiv='refresh' content='3, url=$url'>";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
}
