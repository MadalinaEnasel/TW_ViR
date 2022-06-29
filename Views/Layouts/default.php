<!doctype html>
<head>
    <meta charset="utf-8">
    <title>DailyViR</title>
    <link rel="stylesheet" href="/dailyvir/Content/css/index.css?v=1">
</head>
    <body>
        <div class="navBar">
            <div class="navBar__left">
                <a href="/dailyvir/"><img class="navBar__logo" src="/dailyvir/Content/image/camera.png" alt="The src doesn't exist"></a>
                
                <a class="navBar__textLogo" href="/dailyvir/" target="_self">DailyViR</a>
                <?php
                if(isset($_SESSION['logged']))
                {
                    if($_SESSION['logged'] == 1)
                    {
                ?>
                <div role="search" class="navBar__search">
                        <input type="search" id="searchText" name="search" placeholder="Search...">
                        <img src="http://localhost/dailyvir/Content/image/search.svg" class="navBar__searchIcon" id ="searchSubmit" alt="The src doesn't exist">
                </div>

                <span class="accordion">
                <a><img src="http://localhost/dailyvir/Content/image/menu.svg" class="accordion__catIcon" alt="The src doesn't exist"></a>
                </span>

                <div class="accordion__cat">
                    <a href="/dailyvir/videos/search/Music" class="accordion__catBtn">Music</a>
                    <a href="/dailyvir/videos/search/Art" class="accordion__catBtn">Art</a>
                    <a href="/dailyvir/videos/search/Animation" class="accordion__catBtn">Animation</a>
                    <a href="/dailyvir/videos/search/Dance" class="accordion__catBtn">Dance</a>
                    <a href="/dailyvir/videos/search/Spirituality" class="accordion__catBtn">Spirituality</a>
                    <a href="/dailyvir/videos/search/Beauty" class="accordion__catBtn">Beauty</a>
                    <a href="/dailyvir/videos/search/DIY" class="accordion__catBtn">DIYs</a>
                    <a href="/dailyvir/videos/search/Cooking" class="accordion__catBtn">Cooking</a>
                </div>
                <?php
                    }
                }
                ?>
            </div>

            <div class="navBar__right">
                <?php
                if(isset($_SESSION['logged']))
                {
                    if($_SESSION['logged'] == 1)
                    {
                ?>
                <a href="/dailyvir/users/view/"><img src="http://localhost/dailyvir/Content/image/image.png" class="navBar__pictureAccount" alt="The src doesn't exist"></a>

                <a href="/dailyvir/mains/about"><img src="http://localhost/dailyvir/Content/image/about.svg" class="navBar__aboutIcon" alt="The src doesn't exist"></a>


                <a href="/dailyvir/users/studio/"><img src="http://localhost/dailyvir/Content/image/upload_video.png" class="navBar__uploadIcon " alt="The src doesn't exist"></a>

                <a href="/dailyvir/videos/trending/" class="navBar__trendingBtn">Trending</a>
                
                <span class="accordion">
                    <a><img src="http://localhost/dailyvir/Content/image/notifications.svg" class="accordion__notificationsIcon" alt="The src doesn't exist"></a>
                </span>

                <div class="accordion__notifications">
                    <a class="accordion__notificationsTitle">Notifications:</a>
                        <?php 
                        $xml = simplexml_load_file("Notifications.xml");
                        $list = $xml->channel->item;
                        for($i = count($list) - 1; $i >= 0; $i--)
                        {
                        ?>
                        <div class="accordion__notificationsLeft">
                            <a href = "<?php echo $list[$i]->link?>"><p  class="accordion__notificationsText"><?php echo $list[$i]->title.": ".$list[$i]->description;?></p></a>
                        </div>
                    <?php
                        }
                    ?>
                </div>

                <?php
                    }
                    else
                    {
                ?>
                    <a href="/dailyvir/users/login"><button class="buttonVir" id="aboutlogin">Log in</button></a>

                    <a href="/dailyvir/users/signup"><button class="buttonVir">Sign up</button></a>

                <?php
                    }
                }
                    else
                    {
                ?>
                <div class="buttonsContainer">
                    <a href="/dailyvir/users/login"><button class="buttonVir" id="aboutlogin">Log in</button></a>

                    <a href="/dailyvir/users/signup"><button class="buttonVir">Sign up</button></a>
                    <div>
                <?php
                    }
                ?>
            </div>
        </div>
        <main>
                <?php
                echo $content_for_layout;
                ?>
        </main>
    </body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="/dailyvir/Content/js/scripts.js" type="text/javascript"></script>
</html>
