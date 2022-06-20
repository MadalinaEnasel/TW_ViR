<?php
    session_start();
    $connection = new mysqli('localhost','root','','users');  
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Manage</title>
    <link rel="stylesheet" href="manage_video.css">
  </head>
  <body>
    <div class="menuBar">
      <div class="left">
          <a href="../Home%20Page/home_page.html"><img class="logo" src="camera.png" alt="The src doesn't exist"></a>
          <a class="text--logo" href="../Home%20Page/home_page.html" target="_self">DailyViR</a>
  
          <div role="search" class="search">
              <label for="search"> </label><input type="search"  id="search" name="search" placeholder="Search...">
              <a href="../Home%20Page/home_page.html"><img src="search.png" class="search__icon" alt="The src doesn't exist"></a>
          </div>
  
          <a><img src="menu.png" class="menu__icon" alt="The src doesn't exist"></a>
  
  
      </div>
  
      <div class="right">
  
          <a href="user_profile.html"><img src="image.png" class="profile-account" alt="The src doesn't exist"></a>
  
          <a href="notifications.html"><img src="notifications.png" class="notifications__icon"
                                            alt="The src doesn't exist"></a>
  
          <a class="trendingButton" href="../Trending/trending.html" target="_self">Trending</a>
  
      </div>
    </div>
    <div class="container">
    <?php
            $username = $_SESSION['username'];
            $run = $connection->query("SELECT * FROM user_video WHERE id_user = '$username'");
            foreach($run as $rows)
            {
            ?>
        <div class="column">
            <div class = "grid-item">
              <a href="../Video%20Viewer/view_video.php?id=<?php echo $rows['id_video'];?>"><img src="vimeo.png" alt="The src doesn't exist"></a>
            </div>
            <div class = "grid-item">
              <label class="video-title"><?php 
                              $id_video = $rows['id_video'];
                              $run2 = $connection->query("SELECT * FROM video WHERE id_video = '$id_video'");
                              $rows2 = $run2->fetch_assoc();
                              echo $rows2['title'];
                              ?></label>
              <div class="grid-subitem">
                <label class="tags"><?php 
                              $id_video = $rows['id_video'];
                              $run2 = $connection->query("SELECT * FROM video WHERE id_video = '$id_video'");
                              $rows2 = $run2->fetch_assoc();
                              echo $rows2['description'];
                              ?></label>
              </div>
            </div>
            <div class = "grid-item">
              <a href="../statistics/statistics.html?id=<?php echo $rows['id_video'];?>">
                <button class="edit">Statistics</button>
              </a>
            </div>
            <div class = "grid-item">
              <a href="../upload_video/upload_video.php?id=<?php echo $rows['id_video'];?>">
                <button class="edit">Edit</button>
              </a>
            </div>
          </div>
        <?php
            }
        ?>
        <div class="column">
          <a href="../upload_video/upload_video.php">
            <button class="edit">Upload</button>
          </a>
        </div>

    </div>
  </body>
</html>
