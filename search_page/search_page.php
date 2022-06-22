<?php
    session_start();
    $connection = new mysqli('localhost','root','','users');  
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Manage</title>
    <link rel="stylesheet" href="search_page.css">
  </head>
  <body>
    <div class="menuBar">
      <div class="left">
          <a href="../Home%20Page/home_page.php"><img class="logo" src="camera.png" alt="The src doesn't exist"></a>
          <a class="text--logo" href="../Home%20Page/home_page.php" target="_self">DailyViR</a>
  
          <div role="search" class="search">
              <form action="search_page.php" method=">
                </label><input type="search"  id="Search_text" name="search_text" placeholder="Search...">
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
              window.location = "../search_page.php?search=" + search;
          });
        });
      </script>
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
            $search = $_GET['search_text'];
            $run = $connection->query("SELECT * FROM video WHERE title LIKE '%$search%'");
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
                <label class="description"><?php 
                              $id_video = $rows['id_video'];
                              $run2 = $connection->query("SELECT * FROM video WHERE id_video = '$id_video'");
                              $rows2 = $run2->fetch_assoc();
                              echo $rows2['description'];
                              ?></label>
              </div>
            </div>
        <?php
            }
        ?>
    </div>
  </body>
</html>
