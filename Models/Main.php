<?php
class Main extends Model
{
    function homepageVideos(){
        $sql = "SELECT * FROM video LIMIT 15";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }

}
?>