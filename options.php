<div id="optionsBtn"><img src="../media/cog-svgrepo-com.svg" alt="cog"></div>

<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn">&times;</a>
    <div id="links">
        <a id="home" href="../jstest/jstest.php">HOME</a>
        <?php
        if (!empty($_SESSION['username'])) {
            print("<a href='../LOGIN/logout.php'>Log out</a>
                <a href='../ACCOUNT_PAGE/profile.php'>" . "My profile <br> (" . $_SESSION['username'] . ")</a>");
        } else {
            print("<a href='../index.php'>Log in</a>");
        }
        ?>
    </div>
    <div id="options">

        <?php include "./sort.php" ?>

        <a id="rapport" href="../RAPPORT/Rapport.php">Rapport</a>
    </div>
</div>