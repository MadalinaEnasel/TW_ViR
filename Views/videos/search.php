<?php
    echo "<div class='searchVideoContainer'>";
    foreach($videos as $video)
    {
    echo "<div class ='searchVideoElement'>";
    echo "<div class= 'searchVideo'>";
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
    echo "</div>";
    echo "<div class= 'searchContent'>";
    echo "<div class= 'searchTitle'>";
    echo "<a href='/dailyvir/videos/view/".$video['id_video']."'>";      
    echo "<label class='searchvideo-title'>".$video['title']."</label>";
    echo "</div>";
    echo "</a>";
    echo "<div class= 'searchDescription'>";  
    echo "<label class='description'>".$video['description']."</label>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    }
    echo "</div>";
?>