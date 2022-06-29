<?php
class Video extends Model
{
    function searchVideos($search){
            $sql = "SELECT * FROM video WHERE title LIKE CONCAT('%', :search, '%') OR id_user LIKE CONCAT('%', :search, '%') OR category LIKE CONCAT('%', :search, '%')";
            $req = Database::getBdd()->prepare($sql);
            $req->bindParam(':search',$search);
            $req->execute();
            return $req->fetchAll();
    }

    function trendingVideos(){
        $sql = "SELECT * FROM video WHERE datediff(CURRENT_DATE, upload_date) < 30 ORDER BY views DESC LIMIT 3";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }
    
    function addView($idvideo){
        $sql = "UPDATE video SET views = views + 1 WHERE id_video = :idvideo";
        $req = Database::getBdd()->prepare($sql);
        $req->bindParam(':idvideo',$idvideo);
        $req->execute();
        $sql = "UPDATE statistcs SET views = views + 1 WHERE id_video = :idvideo";
        $req = Database::getBdd()->prepare($sql);
        $req->bindParam(':idvideo',$idvideo);
        $req->execute();
    }

    function addMaleView($idvideo){
        $sql = "UPDATE statistcs SET male_views = male_views + 1 WHERE id_video = :idvideo";
        $req = Database::getBdd()->prepare($sql);
        $req->bindParam(':idvideo',$idvideo);
        $req->execute();
    }

    function addFemaleView($idvideo){
        $sql = "UPDATE statistcs SET views = views + 1 WHERE id_video = :idvideo";
        $req = Database::getBdd()->prepare($sql);
        $req->bindParam(':idvideo',$idvideo);
        $req->execute();
    }

    function addBinaryView($idvideo){
        $sql = "UPDATE statistcs SET binary_views = binary_views + 1 WHERE id_video = :idvideo";
        $req = Database::getBdd()->prepare($sql);
        $req->bindParam(':idvideo',$idvideo);
        $req->execute();
    }

    function addOtherView($idvideo){
        $sql = "UPDATE statistcs SET others_views = others_views + 1 WHERE id_video = :idvideo";
        $req = Database::getBdd()->prepare($sql);
        $req->bindParam(':idvideo',$idvideo);
        $req->execute();
    }

    function getVideoData($idvideo){
        $sql = "SELECT * FROM video WHERE id_video = :idvideo";
        $req = Database::getBdd()->prepare($sql);
        $req->bindParam(':idvideo',$idvideo);
        $req->execute();
        return $req->fetch();
    }

    function getUser($id_user){
        $sql = "SELECT * FROM users WHERE username = :id_user";
        $req = Database::getBdd()->prepare($sql);
        $req->bindParam(':id_user',$id_user);
        $req->execute();
        return $req->fetch();
    }

    function getVideoStats($idvideo){
        $sql = "SELECT * FROM statistcs WHERE id_video = :idvideo";
        $req = Database::getBdd()->prepare($sql);
        $req->bindParam(':idvideo',$idvideo);
        $req->execute();
        return $req->fetch();
    }

    function getComments($idvideo){
        $sql = "SELECT * FROM comments WHERE id_video = :idvideo";
        $req = Database::getBdd()->prepare($sql);
        $req->bindParam(':idvideo',$idvideo);
        $req->execute();
        return $req->fetchAll();
    }

    function addFavourite($id_user,$id_video,$title){
        $sql = "INSERT INTO favourites (id_user, id_video, title) VALUES (:id_user, :id_video, :title)";
        $req = Database::getBdd()->prepare($sql);
        $req->bindParam(':id_user',$id_user);
        $req->bindParam(':id_video',$id_video);
        $req->bindParam(':title',$title);
        return $req->execute();
    }

    function removeFavourite($id_user,$id_video){
        $sql = "DELETE FROM favourites WHERE id_user = :id_user AND id_video = :id_video";
        $req = Database::getBdd()->prepare($sql);
        $req->bindParam(':id_user',$id_user);
        $req->bindParam(':id_video',$id_video);
        $req->execute();
    }

    function addVideo($id_user, $id_video, $title, $description, $category){
        $sql = "INSERT INTO video (id_video, comment_count, views, category, upload_date, tags, title, description, id_user) VALUES (:id_video, 0, 0, :category, current_timestamp(),'video', :title, :description, :id_user);";
        $req = Database::getBdd()->prepare($sql);
        $req->bindParam(':id_user',$id_user);
        $req->bindParam(':id_video',$id_video);
        $req->bindParam(':title',$title);
        $req->bindParam(':description',$description);
        $req->bindParam(':category',$category);
        $req->execute();
        $sql = "INSERT INTO statistcs (id_video, views, male_views, female_views, binary_views, others_views, today_views, dateToday) VALUES (:id_video, 0, 0, 0, 0, 0, 0, current_timestamp());";
        $req = Database::getBdd()->prepare($sql);
        $req->bindParam(':id_video',$id_video);
        $req->execute();
    }

    function removeComment($id_comment){
        $sql = "DELETE FROM comments WHERE id_comment = :id_comment";
        $req = Database::getBdd()->prepare($sql);
        $req->bindParam(':id_comment',$id_comment);
        $req->execute();
    }

    function deleteVideo($id_video){
        $sql = "DELETE FROM favourites WHERE id_video = :id_video";
        $req = Database::getBdd()->prepare($sql);
        $req->bindParam(':id_video',$id_video);
        $req->execute();
        $sql = "DELETE FROM statistcs WHERE id_video = :id_video";
        $req = Database::getBdd()->prepare($sql);
        $req->bindParam(':id_video',$id_video);
        $req->execute();
        $sql = "DELETE FROM video WHERE id_video = :id_video";
        $req = Database::getBdd()->prepare($sql);
        $req->bindParam(':id_video',$id_video);
        $req->execute();
    }

    function deleteComments($id_video){
        $sql = "DELETE FROM comments WHERE id_video = :id_video";
        $req = Database::getBdd()->prepare($sql);
        $req->bindParam(':id_video',$id_video);
        $req->execute();
    }

    function favorited($id_user, $id_video){
        $sql = "SELECT * FROM favourites WHERE id_video = :id_video AND id_user = :id_user";
        $req = Database::getBdd()->prepare($sql);
        $req->bindParam(':id_video',$id_video);
        $req->bindParam(':id_user',$id_user);
        $req->execute();
        return $req->fetch();
    }

    function addComment($id_video, $comment, $id_user){
        $sql = "INSERT INTO comments (id_video, id_user, comment, post_time) VALUES (:id_video, :id_user, :comment, current_timestamp());";
        $req = Database::getBdd()->prepare($sql);
        $req->bindParam(':id_user',$id_user);
        $req->bindParam(':id_video',$id_video);
        $req->bindParam(':comment',$comment);
        $req->execute();
        $sql = "UPDATE video SET comment_count = comment_count + 1 WHERE id_video = :id_video";
        $req = Database::getBdd()->prepare($sql);
        $req->bindParam(':id_video',$id_video);
        $req->execute();
    }
}
?>