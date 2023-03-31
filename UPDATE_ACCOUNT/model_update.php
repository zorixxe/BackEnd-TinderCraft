<?php

$sql = "SELECT * FROM profiles WHERE username=?";

$stmt = $conn->prepare($sql);
$stmt->execute([$_SESSION['username']]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

function checkOld($request, $result, $old){
  if($request == '') $new_ = $result[$old];
  else $new_ = test_input($request);
  return $new_;
}

if (!empty($_REQUEST["update"])) {

  $newpassword = test_input($_REQUEST['password']);
  if($_REQUEST['password']=='') $newpassword = $result['password'];
  else $newpassword = password_hash($newpassword, PASSWORD_DEFAULT); //hash('sha256', $newpassword);
  $newrealName = checkOld($_REQUEST['realName'], $result, 'realName');
  $newemail = checkOld($_REQUEST['email'], $result, 'email');
  $newzipcode = checkOld($_REQUEST['zipcode'], $result, 'zipcode');
  $newbio = checkOld($_REQUEST['bio'], $result, 'bio');
  $newsalary = checkOld($_REQUEST['salary'], $result, 'salary');
  $newpreference = checkOld($_REQUEST['preferences'], $result, 'preference');

    //Hämta användarnamn från sessionsvariabel

  $username = $_SESSION['username'];

    //Insert in i databasen
    $sql = "UPDATE profiles SET password = ?, realname = ?, email = ?, zipcode = ?, bio = ?, salary = ?, preference = ? WHERE username = ?";

    $stmt = $conn->prepare($sql);
    $result = $stmt->execute([$newpassword, $newrealName, $newemail, $newzipcode, $newbio, $newsalary, $newpreference, $username]);

    if ($result) {
      $url = "../ACCOUNT_PAGE/profile.php";
      echo "<meta http-equiv='refresh' content='0, url=$url'>";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }


}