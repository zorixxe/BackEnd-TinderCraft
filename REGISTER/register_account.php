    <form class="form" id="register" action="register.php" method="GET">
        <div>Username:</div> <input type="text" name="username" required>
        <div>Password:</div> <input type="password" name="password" required>
        <div>Full name:</div> <input type="text" name="realName" required>
        <div>Email:</div> <input type="email" name="email" required>
        <div>Postcode:</div> <input min="0" max="999999999" type="number" name="zipcode" required>
        <div>Bio:</div> <textarea maxlength="255" name="bio" rows="3" cols="31" required></textarea>
        <div>Income:</div> <input max="999999999" min="0" type="number" placeholder="Yearly income" name="salary" required>
        <div>Gender:</div> <select name="preferences">
            <option value="1" selected>Man</option>
            <option value="2">Woman</option>
            <option value="3">Other</option>
         <!--   <option value="4">All</option> -->
        </select>
        <input type="submit" name="submit" value="Register">
        <?php include "./model_register.php" ?>
        <a href="../index.php">Cancel</a>
    </form>
