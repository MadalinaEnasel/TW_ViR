<?php
    echo "<div class = 'homepageTitleContainer'>";
    echo "<label class='homepageTitle'>Welcome to DailyViR, ".$_SESSION['username']."</label>";
    echo "</div>";
    echo "<div class='homepageVideoContainer'>";
    foreach($videos as $video)
    {
    echo "<div class ='videoContainer'>";
    echo "<a href='/dailyvir/videos/view/".$video['id_video']."'>";
    echo "<div class='homepageVideoDiv'>";
    echo "<iframe src='https://player.vimeo.com/video/".$video['id_video']."' frameborder='0'       style='
        width: 100%;
        height: 100%;
        pointer-events: none;
      -webkit-transform:scale(1.0);
      -moz-transform:scale(0.8);
      -o-transform:scale(0.6);
      -ms-transform:scale(0.8);' webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>";
    echo "</div>";
    echo "</a>";
    echo "<div class='titleContainer'>";
    echo "<label class='video-title'>".$video['title']."</label>";
    echo "</div>";
    echo "</div>";
    }
    echo "</div>";
?>