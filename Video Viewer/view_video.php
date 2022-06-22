<?php
session_start();
$connection = mysqli_connect('localhost','root','','tw_vir');
$id_video = $_GET['id_video'];
$sql = $connection->query("SELECT * FROM video WHERE id_video = '$id_video'");
$row = $sql->fetch_assoc();
$title = $row['title'];
$description = $row['description'];
if (isset($_POST['subject'])){
    $username = $_SESSION['username'];
    $comment = $_POST['subject'];
    $sql = $connection->query("SELECT MAX(CAST(id_comment AS int)) + 1 AS MAXID FROM video_comment");
    $result = $sql->fetch_assoc();
    $id_comment = $result['MAXID'] + 1; 
    $sql = $connection->query("INSERT INTO comments (`id_comment`, `post_time`, `id_user`, `comment`) VALUES ($id_comment, current_timestamp(), '$username', '$comment');");
    $sql = $connection->query("INSERT INTO video_comment (`id_comment`, `id_video`) VALUES ($id_comment, '$id_video');");

    $rssDoc = new DOMDocument();
    $rss_file = '../Notifications.xml';
    $rssDoc->load($rss_file);
    $items = $rssDoc->getElementsByTagName('Notifications');
    
    $firstItem = $items->item(0);
    $newItem = $rssDoc->createElement('Notification');
    $newItem2[] = $rssDoc->createElement('Action', "Commented on the video: '$id_video'");
    $newItem2[] = $rssDoc->createElement('User', $username);
    foreach ($newItem2 as $xmlItem){
        $newItem->insertBefore($xmlItem,$newItem->firstChild);
       } 
     $firstItem->insertBefore($newItem,$firstItem->firstChild);
    
    $rssDoc->save('../Notifications.xml');
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Video Viewer</title>
    <link rel="stylesheet" href="view_video.css">
</head>
<body>

<div class="navBar">
    <div class="navBar__left">
        <a href="../Home%20Page/home_page.html"><img class="navBar__logo" src="camera.png" alt="The src doesn't exist"></a>
        <a class="navBar__textLogo" href="../Home%20Page/home_page.html" target="_self">DailyViR</a>

        <div role="search" class="navBar__search">
            <label for="search"> </label><input type="search" id="search" name="search" placeholder="Search...">
            <a href="../Home%20Page/home_page.html"><img src="search.svg" class="navBar__searchIcon"
                                                         alt="The src doesn't exist"></a>
        </div>

        <span class="accordion">
        <a><img src="menu.svg" class="accordion__catIcon" alt="The src doesn't exist"></a>
        </span>

        <div class="accordion__cat">
            <a class="accordion__catBtn">For you</a>
            <a class="accordion__catBtn">Music</a>
            <a class="accordion__catBtn">Streaming</a>
            <a class="accordion__catBtn">Politics</a>
            <a class="accordion__catBtn">Spirituality</a>
            <a class="accordion__catBtn">Beauty</a>
            <a class="accordion__catBtn">DIYs</a>
            <a class="accordion__catBtn">Cooking</a>
        </div>

    </div>

    <div class="navBar__right">

        <a href="../Profile%20User/user_profile.html"><img src="image.png" class="navBar__pictureAccount"
                                         alt="The src doesn't exist"></a>

        <a href="../Help/help.html"><img src="help.png" class="navBar__helpIcon"
                                         alt="The src doesn't exist"></a><!--Doesn't exist yet-->

        <a href="../About/about.html"><img src="about.svg" class="navBar__aboutIcon"
                                           alt="The src doesn't exist"></a><!--Doesn't exist yet-->

        <span class="accordion">
            <a><img src="notifications.svg" class="accordion__notificationsIcon" alt="The src doesn't exist"></a>
        </span>

        <div class="accordion__notifications">
            <a class="accordion__notificationsTitle">Notifications:</a>
            <a>
                <?php 
                $xml = simplexml_load_file("../Notifications.xml");
                foreach($xml as $notification)
                {
                ?>
                <div class="accordion__notificationsLeft">
                    <a href="../Profile%20User/../Profile%20User/user_profile.html"><img src="image.png"
                                                                                         class="navBar__userPicture"
                                                                                         alt="The src doesn't exist"></a>
                </div>
                <div class="accordion__notificationsRight">
                    <p class="accordion__notificationsText"><?php echo $notification->User." ".$notification->Action;?></p>
                </div>
            </a>
            <?php
                }
                ?>
        </div>

        <a href="../upload_video/upload_video.html"><img src="upload_video.png" class="navBar__uploadIcon "
                                                           alt="The src doesn't exist"></a>

        <a class="navBar__trendingBtn" href="../Trending/trending.html" target="_self">Trending</a>

    </div>
</div>

<main class="background">

    <div class="background__columnLeft">
        <div class="video-content">
            <div class="vid-player">
                <iframe src="https://player.vimeo.com/video/<?php echo $id_video;?>" width="30%" height="400px" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            </div>
        </div>

        <div class="background__videoTitle"><?php echo $title;?></div>

        <span class="accordion">
            <a><img src="more.png" class="accordion__moreIcon" alt="The src doesn't exist"></a>
        </span>

        <div class="accordion__description">
            <p class="background__description"><?php echo $description;?></p>
            <p class="background__hashtags">#hashtag1 #hashtag2 #hashtag3 #hashtag4</p>
        </div>

        <hr class="background__line">

        <p class="background__comments">Comments:</p>
        <form action="view_video.php?id=<?php echo $id_video;?>" method="post">
            <label for="writeComment">
                <a href="../Profile%20User/../Profile%20User/user_profile.html"><img src="image.png"
                                                                                     class="background--userPicture"
                                                                                     alt="The src doesn't exist"></a></label>
            <textarea id="writeComment" name="subject" placeholder="Write a comment.." style="height:50px"></textarea><br>
            <button type = "submit" id="search">Post</button>
        </form>


        <div class="background__videoRight">

        <?php
            $sql = $connection->query("SELECT * FROM video_comment WHERE id_video = '$id_video'");
            foreach($sql as $rows)
            {
        ?>
            <div>
                <a href="../Profile%20User/user_profile.html"><img src="image.png" class="background--userPicture" alt="The src doesn't exist"></a>
            </div>
            <div class="background__comment">
                <p class="background__commentText"><?php
                $idcomment = $rows['id_comment'];
                $sql2 = $connection->query("SELECT * FROM comments WHERE id_comment = '$idcomment'");
                $rows2 = $sql2->fetch_assoc();
                echo $rows2['comment'];
                ?></p>
            </div>
        <?php
        }
        ?>
        </div>

    </div>

    <div class="background__columnRight">
        <video class="background__video" controls>
        </video>
        <p class="background__videoTitleRight">Some Title and other stuff like that</p>

        <video class="background__video" controls>
        </video>
        <p class="background__videoTitleRight">Some Title and other stuff like that</p>

        <video class="background__video" controls>
        </video>
        <p class="background__videoTitleRight">Some Title and other stuff like that</p>

        <video class="background__video" controls>
        </video>
        <p class="background__videoTitleRight">Some Title and other stuff like that</p>

        <video class="background__video" controls>
        </video>
        <p class="background__videoTitleRight">Some Title and other stuff like that</p>

        <video class="background__video" controls>
        </video>
        <p class="background__videoTitleRight">Some Title and other stuff like that</p>

        <video class="background__video" controls>
        </video>
        <p class="background__videoTitleRight">Some Title and other stuff like that</p>
    </div>

</main>
<script>
    const acc = document.getElementsByClassName("accordion");

    acc[0].addEventListener("click", function () {
        this.classList.toggle("active");
        const panel = this.nextElementSibling;
        if (panel.style.display === "grid") {
            panel.style.display = "none";
        } else {
            panel.style.display = "grid";
        }
    });

    acc[1].addEventListener("click", function () {
        this.classList.toggle("active");
        const panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    });

    acc[2].addEventListener("click", function () {
        this.classList.toggle("active");
        const panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    });

</script>

</body>
</html>