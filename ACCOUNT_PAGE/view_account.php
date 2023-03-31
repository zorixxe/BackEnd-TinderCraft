<h2>Quickly change bio</h2>
<?php include "model_account.php" ?>

<form action="profile.php" method="get">
    <textarea name="bioChange" rows="10" cols="31" placeholder="<?= $result['bio'];?>" required></textarea><br>
    <input type="submit" value="Change bio">
</form>