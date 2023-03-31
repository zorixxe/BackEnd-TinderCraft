<?php include "../handy_methods.php" ?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DateCraft</title>
    <link rel="stylesheet" href="./sailestyling.css">
    <script src="./script.js" defer></script>
</head>

<body>

<?php
session_unset();
$_SESSION['username'] = "";
$url = "../index.php";
echo "<meta http-equiv='refresh' content='0, url=$url'>";
?>

</body>

</html>