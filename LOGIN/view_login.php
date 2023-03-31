<div class="form">
    <form id="login" action="index.php" method="GET">
        <input type="text" name="username" placeholder="Username"><br>
        <input type="password" name="pass" placeholder="Password"><br>
        <input type="submit" value="Log in">
    </form>
    <?php 
    $url = "./jstest/jstest.php";
    include "./LOGIN/model_login.php"; ?>
    <p>New user? <a href="./REGISTER/register.php">Register here!</a><br>
    Continue as a guest user? <a href="./jstest/jstest.php">Click here!</a></p>
    
</div>

