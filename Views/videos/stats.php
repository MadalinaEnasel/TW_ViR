<?php
    echo "<div>";
    echo "<label> Title: ".$video['title']."</label>";
    echo "</div>";
    echo "<div>";
    echo "<label> Uploaded by ".$video['id_user']."</label>";
    echo "</div>";
    echo "<div>";
    echo "<label> Upload date: ".$video['upload_date']."</label>";
    echo "</div>";
    echo "<div>";
    echo "<label> Description: ".$video['description']."</label>";
    echo "</div>";
    echo "<div>";
    echo "<svg class='chart' width='420' height='150' aria-labelledby='title desc' role='img'>";
    echo "<title id='title'>A bar chart showing information</title>";
    echo "<g class='bar''>";
    echo "<rect width='".$stats['views']."' height='19'></rect>";
    echo "<text x='".$stats['views']."' y='9.5' dy='.35em'>".$stats['views']." Views</text>";
    echo "</g>";
    echo "<g class='bar'>";
    echo "<rect width='".$stats['female_views']."' height='19' y='20'></rect>";
    echo "<text x='".$stats['female_views']."' y='28' dy='.35em'>".$stats['female_views']." Female views</text>";
    echo "</g>";
    echo "<g class='bar'>";
    echo "<rect width='".($stats['male_views'])."' height='19' y='40'></rect>";
    echo "<text x='".($stats['male_views'])."' y='48' dy='.35em'>".$stats['male_views']." Male views</text>";
    echo "</g>";
    echo "<g class='bar'>";
    echo "<rect width='".$stats['binary_views']."' height='19' y='80'></rect>";
    echo "<text x='".$stats['binary_views']."' y='88' dy='.35em'>".$stats['binary_views']." Binary views</text>";
    echo "</g>";
    echo "<g class='bar'>";
    echo "<rect width='".$stats['others_views']."' height='19' y='60'></rect>";
    echo "<text x='".$stats['others_views']."' y='68' dy='.35em'>".$stats['others_views']." Other views</text>";
    echo "</g>";
    echo "</svg>";
    echo "</div>";
    echo "</div>";
?>