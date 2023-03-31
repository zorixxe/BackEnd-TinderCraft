<?php include "model_update.php" ?>

<form class="form" id="register" action="update.php" method="GET">
    <div>Password:</div> <input type="password" name="password" placeholder="New password">
    <div>Full name:</div> <input type="text" name="realName" placeholder="<?= $result["realName"]; ?>">
    <div>Email:</div> <input type="email" name="email" placeholder="<?= $result["email"]; ?>">
    <div>Postcode:</div> <input min="0" max="999999999" type="number" name="zipcode" placeholder="<?= $result["zipcode"]; ?>">
    <div>Bio:</div> <textarea maxlength="255" name="bio" rows="3" cols="31" placeholder="<?= $result["bio"]; ?>"></textarea>
    <div>Income:</div> <input max="999999999" min="0" type="number" name="salary" placeholder="<?= $result["salary"]; ?>">
    <div>Gender:</div> <select name="preferences">
        <option value="1" <?php if($result['preference'] == 1) echo "selected"?>>Man</option>
        <option value="2" <?php if($result['preference'] == 2) echo "selected"?>>Woman</option>
        <option value="3" <?php if($result['preference'] == 3) echo "selected"?>>Other</option>
    </select>
    <input type="submit" name="update" value="Update info">
    <a href="../ACCOUNT_PAGE/profile.php">Cancel</a>
</form>
