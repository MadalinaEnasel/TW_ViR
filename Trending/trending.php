<?php
session_start();
$connection=mysqli_connect('localhost','root','','users');
$data=date("d");
$data-=7;
$sql=$connection->query("Select id_video from video ORDER BY  views ASC where upload_date>='$data' and rownum <4 ");
$rows=  $sql->fetch_assoc();
$id_video=$rows['id_video'];

function count_views(){
    $connect=mysqli_connect('localhost','root','root','tw_vir');
// trb sa intreb daca utilizatorul a apasat pe video in html
//daca da memoram id video si id utilizator
//incrementam nr de views
//dupa incrementam in statistcs video nr de views in functie de gender
    if( isset($_GET['id']) && !empty($_GET['id']) ) {
        $video_id = $_GET['id'];
        $sql = connection->query("SELECT * from video where id_video='$video_id' ");
        $row = $sql->fetch_assoc();
        $views = $row['views'];
        $views = $views + 1;
        $query = connection->query("UPDATE video set views='{$views}' where id='$video_id'");
        $user_id = $_GET['id'];
        $sql2 = connection->query("SELECT * from users where user_id='$user_id'");
        $row1 = $sql2->fetch_assoc();
        $gender = row1['gender'];
        if ($gender == 'male')
            $query = connection->query("UPDATE statistics set  male_views=male_views+1");
        else
            if ($gender = 'female')
                $query = connection->query("UPDATE statistics set  female_views=female_views+1");
            else if ($gender == 'non-binary')
                $query = connection->query("UPDATE statistics set  binary_views=binary_views+1");
            else if ($gender == 'others')
                $query = connection->query("UPDATE statistics set  others_views=others_views+1");
            else
                $query = connection->query("UPDATE statistics set  today_views=today_views+1");
    }
}
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

                    <iframe width="100%" height="100%"
                            data-vimeo-id="<?php $id_video?>"
                            style="border-radius: 20px;"
                            data-vimeo-autoplay="false">
                    </iframe>
                    <?php
                    count_views();
                    ?>
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

                    <iframe width="100%" height="100%"
                            data-vimeo-id="<?php $id_video?>"
                            style="border-radius: 20px;"
                            data-vimeo-autoplay="false">
                    </iframe>
                    <?php
                     count_views();
                    ?>
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
                    <iframe width="100%" height="100%"
                            data-vimeo-id="<?php $id_video?>"
                            style="border-radius: 20px;"
                    data-vimeo-autoplay="false">
                    </iframe>
                    <?php
                    count_views();
                    ?>

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

                    <iframe width="100%" height="100%"
                            data-vimeo-id="<?php $id_video?>"
                            style="border-radius: 20px;"
                            data-vimeo-autoplay="false">
                    </iframe>
                    <?php
                    count_views();
                    ?>
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