<?php include "../handy_methods.php" ?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DateCraft</title>
    <link rel="stylesheet" href="../options.css">
    <link rel="stylesheet" href="../jstest/jstest.css">
    <link rel="stylesheet" href="../style.css">
    <script src="../options.js" defer></script>

</head>

<body>

    <?php include "../options.php" ?>

    <div id="container">

        <div class="comments accountComments">

            <?php
            include "../jstest/model_comments.php";

            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
                <div class='comment'><a href='../jstest/jstest.php?profile=<?= $result['username'] ?>' id='sender'><b> <?= $result["username"] . " " ?></b></a><span id='date'><i><?= $result["date"] ?></i></span><br>
                    <div id='message'><?= $result["message"] ?></div><br><br>
                </div>
            <?php endwhile;

            ?>

        </div>

        <div id="updateprofilepic">
            <?php include "./upload_pic_view.php" ?>
        </div>


        <?php include "./view_account.php" ?>

        <?php include "./update_login.php" ?>

        <div id="delete">
            <a href="./deleteaccount.php">DELETE ACCOUNT</a>
        </div>

    </div>
</body>

</html>