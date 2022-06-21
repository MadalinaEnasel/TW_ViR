<?php
session_start();
$connection=mysqli_connect('localhost','root','root','tw_vir');
$data=GET_DATE();
$data-=7;
$sql=$connection->query("Select video_id from video ORDER BY  views ASC where upload_date>='$data' and rownum <4 ");
$rows=  $sql->fetch_assoc();
$id_video=&rows['id_video'];
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Profile</title>
    <link rel="stylesheet" href="trending.css">
</head>
<body>

<div class="menuBar">
    <div class="left">
        <a href="../Home%20Page/home_page.html"><img class="logo" src="camera.png" alt="The src doesn't exist"></a>
        <a class="text--logo" href="../Home%20Page/home_page.html" target="_self">DailyViR</a>

        <div role="search" class="search">
            <label for="search"> </label><input type="search"  id="search" name="search" placeholder="Search...">
            <a href="../Home%20Page/home_page.html"><img src="search.svg" class="search__icon" alt="The src doesn't exist"></a>
        </div>

        <a><img src="menu.svg" class="menu__icon" alt="The src doesn't exist"></a>


    </div>

    <div class="right">

        <a href="user_profile.html"><img src="image.png" class="profile-account" alt="The src doesn't exist"></a>

        <a href="notifications.html"><img src="notifications.svg" class="notifications__icon"
                                          alt="The src doesn't exist"></a>

        <a href="../Upload%20Video/upload_video.html"><img src="upload_video.png" class="upload__icon"
                                                           alt="The src doesn't exist"></a>

        <a class="trendingButton" href="../Trending/trending.html" target="_self">Trending</a>

    </div>
</div>

<main class="background">
    <div class="container_clipuri">
        <div class="container_titlu">
            <p class="text__title">#Number1</p>
        </div>
        <div class="row_clipuri">

            <div class="column_clipuri">
                <a href="../Video%20Viewer/view_video.php?id=<?php echo $rows['id_video'];?>">

                </a>


            </div>
            <div class="column_info">


                <div class="row_video_left">
                    <a href="user_profile.html" style="margin-left: 10px;"><img src="image.png" class="user_picture"
                                                                                alt="The src doesn't exist"></a>

                </div>

                <label class="row_video_right"><?php
                    $run=$connection->query("SELECT * from video where  id_video='$id_video'");
                    $rows=$run->fetch_assoc();
                    echo $rows['title'];
                    ?>
                </label>
            </div>
        </div>

        <div class="container_titlu">
            <p class="text__title">#Number2</p>
        </div>
        <div class="row_clipuri">

            <div class="column_clipuri">
                <a href="../Video%20Viewer/view_video.php?id=<?php echo $rows['id_video'];?>">

                </a>

            </div>
            <div class="column_info">


                <div class="row_video_left">
                    <a href="user_profile.html" style="margin-left: 10px;"><img src="image.png" class="user_picture"
                                                                                alt="The src doesn't exist"></a>

                </div>
                <label class="row_video_right"><?php
                    $run=$connection->query("SELECT * from video where  id_video='$id_video'");
                    $rows=$run->fetch_assoc();
                    echo $rows['title'];
                    ?>
                </label>
            </div>
        </div>

        <div class="container_titlu">
            <p class="text__title">#Number3</p>
        </div>
        <div class="row_clipuri">

            <div class="column_clipuri">
                <a href="../Video%20Viewer/view_video.php?id=<?php echo $rows['id_video'];?>">


                </a>

            </div>
            <div class="column_info">


                <div class="row_video_left">
                    <a href="user_profile.html" style="margin-left: 10px;"><img src="image.png" class="user_picture"
                                                                                alt="The src doesn't exist"></a>

                </div>

                <label class="row_video_right"><?php
                    $run=$connection->query("SELECT * from video where  id_video='$id_video'");
                    $rows=$run->fetch_assoc();
                    echo $rows['title'];
                    ?>
                </label>
            </div>
        </div>

        <div class="container_titlu">
            <p class="text__title">#Number4</p>
        </div>
        <div class="row_clipuri">

            <div class="column_clipuri">
                <a href="../Video%20Viewer/view_video.php?id=<?php echo $rows['id_video'];?>">

                </a>

            </div>
            <div class="column_info">


                <div class="row_video_left">
                    <a href="user_profile.html" style="margin-left: 10px;"><img src="image.png" class="user_picture"
                                                                                alt="The src doesn't exist"></a>

                </div>

                <label class="row_video_right"><?php
                    $run=$connection->query("SELECT * from video where  id_video='$id_video'");
                    $rows=$run->fetch_assoc();
                    echo $rows['title'];
                    ?>
                </label>
            </div>
        </div>
    </div>







</main>
</body>


</html>