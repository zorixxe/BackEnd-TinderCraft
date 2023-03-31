<?php include "../handy_methods.php" ?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DateCraft</title>
    <link rel="stylesheet" href="./jstest.css">
    <link rel="stylesheet" href="../options.css">
    <script src="./jstest.js" defer></script>
    <script src="../options.js" defer></script>
</head>

<body>
    <?php

    include "../options.php";

    if (!empty($_REQUEST["profile"]) || !empty($_REQUEST['comment'])) {
        if ($_REQUEST['profile'] == $_SESSION['username']) {
            $url = "../ACCOUNT_PAGE/profile.php";
            echo "<meta http-equiv='refresh' content='0, url=$url'>";
            exit();
        }
        if (!empty($_REQUEST['profile'])) $_SESSION['profile'] = $_REQUEST["profile"];
        include "view_profile.php";
    } else include "createContainer.php"; ?>

    <footer>
        DateCraft 2023<sup>&#169;</sup>
    </footer>
</body>

</html>