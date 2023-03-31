<?php

// Set the default sort order
$sort_column = 'RAND()';

// Check if a sort option was selected
if (!empty($_REQUEST['sort'])) {
    switch ($_REQUEST['sort']) {
        case 'likes-asc':
            $sort_column = 'likes ASC';
            break;
        case 'likes-desc':
            $sort_column = 'likes DESC';
            break;
        case 'salary-asc':
            $sort_column = 'salary ASC';
            break;
        case 'salary-desc':
            $sort_column = 'salary DESC';
            break;
        case 'zipcode-asc':
            $sort_column = 'zipcode ASC';
            break;
        case 'zipcode-desc':
            $sort_column = 'zipcode DESC';
            break;
        default:
            break;
    }
}

$sql = "SELECT * FROM profiles WHERE username != ? ORDER BY $sort_column LIMIT 5";

if(!empty($_REQUEST['preference']) && $_REQUEST['preference'] != 4) {
    $preference = $_REQUEST['preference'];
    $sql = "SELECT * FROM profiles WHERE username != ? AND preference = $preference ORDER BY $sort_column LIMIT 5";
};

$stmt = $conn->prepare($sql);
if (empty($_SESSION['username'])) $_SESSION['username'] = "";
$stmt->execute([$_SESSION['username']]);

$n = 1;

while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) :
    
    $username = $result['username'];
    $realName = $result['realName'];
    $bio = $result['bio'];
    $likes = $result['likes'];
    $id = $result['id'];
    $pic = $result['picture'];
    if(strlen($bio) > 100) $bio = substr($bio, 0, 100) . "...";

?>
<div class='n' id='n<?=$n?>'>
    <div class='container' id='<?=$id?>'>
        <div class='image'>
            <img src="<?php if($pic == null) echo '../media/pexels-pixabay-220453.jpg'; else echo "data:image/jpeg;base64,". base64_encode($pic);?>" alt='profilepic'>
        </div>
        <div class='overlay'></div>
        <a class='name' href='jstest.php?profile=<?=$username?>'><b><?=$realName?></b> </a>
        <p class='bio'><?=$bio?></p>
    </div>

    <div class='likeAmount'><?=$likes; if($likes == 1 || $likes == -1) echo ' like'; else echo ' likes';?></div>

    <div class='circle dislike' id='dislikelike<?=$n?>'>
        <img src='../media/Minecraft-Skeleton-Head.png'>
    </div>

    <div class='circle like' id='like<?=$n?>'>
        <img src='../media/heart.png'>
    </div>

    <div class='next'>
        <span>NEXT --&gt;</span>
    </div>
</div>

<?php $n++;
endwhile ;?>