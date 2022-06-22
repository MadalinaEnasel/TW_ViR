<?php
session_start();
include("developers.php");
if (!isset($_SESSION['loggedIN'])){
    header('Location: login.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home Page</title>
    <link rel="stylesheet" href="home_page.css">
</head>
<body>

<div class="navBar">
    <div class="navBar__left">
        <a href="home_page.php"><img class="navBar__logo" src="camera.png" alt="The src doesn't exist"></a>
        <a class="navBar__textLogo" href="home_page.php" target="_self">DailyViR</a>

        <div role="search" class="navBar__search">
            <label for="search"> </label><input type="search" id="search" name="search" placeholder="Search...">
            <a href="../Home%20Page/home_page.php"><img src="search.svg" class="navBar__searchIcon"
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
                    <a href="../Profile%20User/user_profile.html"><img src="image.png"
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

        <a href="../manage_video/manage_video.php"><img src="upload_video.png" class="navBar__uploadIcon "
                                                         alt="The src doesn't exist"></a>

        <a class="navBar__trendingBtn" href="../Trending/trending.php" target="_self">Trending</a>

    </div>
</div>

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

</script>

<main class="background">
    <?php echo $deleteMsg ?? ''; ?>
    <div class="background__row">
        <?php
        if (is_array($fetchData)) {
            foreach ($fetchData as $data) {
                ?>
                <div class="background__detailedVideo">
                   <a href = "../Video%20Viewer/view_video.php?id=<?php echo $data['id_video'];?>"> <video class="background__video" controls>
                    </video></a>
                    <div class="background__underVideo">
                        <div class="background__underVideoRight">
                            <a href = "../Video%20Viewer/view_video.php?id=<?php echo $data['id_video'];?>"><p class="background__title"><?php echo $data['title'] ?? ''; ?></p></a>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else { ?>
            <div>
                <?php echo $fetchData; ?>
            </div>
            <?php
        } ?>
    </div>
</main>
</body>

</html>