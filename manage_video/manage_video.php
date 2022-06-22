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
          <a href="../Home%20Page/home_page.php"><img class="logo" src="camera.png" alt="The src doesn't exist"></a>
          <a class="text--logo" href="../Home%20Page/home_page.php" target="_self">DailyViR</a>
  
          <div role="search" class="search">
              <form action="../search_page/search_page.php">
                <input type="search"  id="Search_text" name="search_text" placeholder="Search...">
                <button type = "submit" id="search"><img src="search.png" class="search__icon" alt="The src doesn't exist"></button>
              </form>
          </div>
          <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
          <script type="text/javascript">
          $(document).ready(function (){
            $("#search").on('click', function() {
            var search = $("#search_text").val();

            if (search == "")
              alert('Please check your inputs');
            else
              window.location = "../search_page/search_page.php?search=" + search;
          });
        });
      </script>
  
      </div>
  
      <div class="right">
  
          <a href="../Profile%20User/user_profile.html"><img src="image.png" class="profile-account" alt="The src doesn't exist"></a>
  
          <a class="trendingButton" href="../Trending/trending_page.html" target="_self">Trending</a>
  
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
            <a href="../Video%20Viewer/view_video.php?id=<?php echo $rows['id_video'];?>">
            <div class = "grid-item">
              <img src="vimeo.png" alt="The src doesn't exist">
            </div>
            <div class = "grid-item">
              <label class="video-title"><?php 
                              $id_video = $rows['id_video'];
                              $run2 = $connection->query("SELECT * FROM video WHERE id_video = '$id_video'");
                              $rows2 = $run2->fetch_assoc();
                              echo $rows2['title'];
                              ?></label>
              <a>
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
              <a href="../Statistics/statistics.php?id=<?php echo $rows['id_video'];?>">
                <button class="edit">Statistics</button>
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
