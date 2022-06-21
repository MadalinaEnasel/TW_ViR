<?php
session_start();
$connection = mysqli_connect('localhost','root','','users');
$id_video = $_GET['id'];
$sql = $connection->query("SELECT * FROM video WHERE id_video = '$id_video'");
$row = $sql->fetch_assoc();
$title = $row['title'];
$description = $row['description'];
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
                <div class="accordion__notificationsLeft">
                    <a href="../Profile%20User/../Profile%20User/user_profile.html"><img src="image.png"
                                                                                         class="navBar__userPicture"
                                                                                         alt="The src doesn't exist"></a>
                </div>
                <div class="accordion__notificationsRight">
                    <p class="accordion__notificationsText">Username1 uploaded a video, you might want to take a look at
                        that!</p>
                </div>
            </a>

            <a>
                <div class="accordion__notificationsLeft">
                    <a href="../Profile%20User/../Profile%20User/user_profile.html"><img src="image.png"
                                                                                         class="navBar__userPicture"
                                                                                         alt="The src doesn't exist"></a>
                </div>
                <div class="accordion__notificationsRight">
                    <p class="accordion__notificationsText">Username2 left their opinion under one of your videos. Go
                        check it out!</p>
                </div>
            </a>

            <a>
                <div class="accordion__notificationsLeft">
                    <a href="../Profile%20User/../Profile%20User/user_profile.html"><img src="image.png"
                                                                                         class="navBar__userPicture"
                                                                                         alt="The src doesn't exist"></a>
                </div>
                <div class="accordion__notificationsRight">
                    <p class="accordion__notificationsText">Check here the new trending list! </p>
                </div>
            </a>

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
                <iframe src="https://player.vimeo.com/video/<?php echo $id_video;?>" width="400" height="400" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
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
        <form action="action_page.php" method="post">
            <label for="writeComment">
                <a href="../Profile%20User/../Profile%20User/user_profile.html"><img src="image.png"
                                                                                     class="background--userPicture"
                                                                                     alt="The src doesn't exist"></a></label>
            <textarea id="writeComment" name="subject" placeholder="Write a comment.." style="height:50px"></textarea><br>
        </form>

        <div class="background__videoLeft">
            <a href="../Profile%20User/user_profile.html"><img src="image.png" class="background--userPicture"
                                                               alt="The src doesn't exist"></a><br>
            <p class="background__usernameText">U.N.</p>

            <a href="../Profile%20User/user_profile.html"><img src="image.png" class="background--userPicture"
                                                               alt="The src doesn't exist"></a><br>
            <p class="background__usernameText">U.N.</p>
        </div>

        <div class="background__videoRight">
            <div class="background__comment">
                <p class="background__commentText">The greatest video I've ever seen!!!!!! Totally recommend! Thank youuuuu! </p>
            </div>

            <div class="background__comment">
                <p class="background__commentText">Booooooooooooo! A real waste of time!  </p>
            </div>

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