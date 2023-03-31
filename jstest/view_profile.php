<?php 
include "./model_ad.php";
$n = 1; ?>

<div class='n' id='n<?= $n ?>'>
    <div class='container containerProfile' id='<?= $result['id'] ?>'>
        <div class='imageProfile'>
            <img src="<?php if($result['picture'] == null) echo '../media/pexels-pixabay-220453.jpg'; else echo "data:image/jpeg;base64,". base64_encode($result['picture']);?>" alt='profilepic'>
            <div class='overlayProfile'></div>
        </div>

        <p class='nameProfile'><b><?= $result['realName'] ?> </b> <?php if ($_SESSION['username']) echo "<br>" . $result['email']; ?> </p>
        <p class='bioProfile'><?= $result['bio'] ?></p>
        <?php if ($_SESSION['username']) echo "<p class='salaryProfile'>" . "Salary: " . $result['salary'] . "</p>" ?>

        <div class="formProfile">
            <div class="comments">

                <?php include "./model_comments.php";

                while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
                    <div class='comment'><a href='jstest.php?profile=<?=$result['username']?>' id='sender'><b> <?= $result["username"] . " " ?></b></a><span id='date'><i><?= $result["date"] ?></i></span><br>
                    <div id='message'><?= $result["message"] ?></div><br><br></div>
                <?php endwhile;

                ?>

            </div>
            <form action="jstest.php" method="POST">
                <input type="submit" value="Post" <?php if (empty($_SESSION['username'])) echo "disabled='disabled'" ?>>
                <textarea maxlength="255" name="comment" <?php if (empty($_SESSION['username'])) echo "disabled='disabled'" ?>placeholder="Comment" rows="3" cols="31" required></textarea>
            </form>
        </div>
    </div>

    <?php include "./model_ad.php" ?>
    <div class="likesProfile">
        <div class='likeAmount'><?= $result['likes'];
                                if ($result['realName'] == 1 || $result['realName'] == -1) echo ' like';
                                else echo ' likes'; ?></div>

        <div class='circle dislike' id='dislikelike<?= $n ?>'>
            <img src='../media/Minecraft-Skeleton-Head.png'>
        </div>

        <div class='circle like' id='like<?= $n ?>'>
            <img src='../media/heart.png'>
        </div>
    </div>

    <div class="backButton">
        <a href="../jstest/jstest.php">&lt;--</a>
    </div>

</div>