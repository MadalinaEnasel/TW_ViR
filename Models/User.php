<?php
class User extends Model
{
    function userVideos($iduser){
        $sql = "SELECT * FROM video WHERE id_user = :iduser";
        $req = Database::getBdd()->prepare($sql);
        $req->bindParam(':iduser',$iduser);
        $req->execute();
        return $req->fetchAll();
    }

    function getUsers(){
        $sql = "SELECT * FROM users";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }

    function addUser($iduser,$gender,$email,$password,$country){
        $sql = "INSERT INTO users (username, gender, email, password, country, fav_cat) VALUES (:iduser, :gender, :email, :password, :country, 0);";
        $req = Database::getBdd()->prepare($sql);
        $req->bindParam(':iduser',$iduser);
        $req->bindParam(':gender',$gender);
        $req->bindParam(':email',$email);
        $req->bindParam(':password',$password);
        $req->bindParam(':country',$country);
        return $req->execute();
    }
 
    function changePassword($iduser,$password){
        $sql = "UPDATE users SET password = :passwordz WHERE username = :id_userz";
        $req = Database::getBdd()->prepare($sql);
        $req->bindParam(':id_userz',$iduser);
        $req->bindParam(':passwordz',$password);
        $req->execute();
    }

    function changeEmail($iduser,$email){
        $sql = "UPDATE users SET email = :email WHERE id_user = :id_user";
        $req = Database::getBdd()->prepare($sql);
        $req->bindParam(':id_user',$iduser);
        $req->bindParam(':email',$email);
        $req->execute();
    }

    function getUserList(){
        $sql = "SELECT * FROM users";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }

    function deleteUser($user){
        $sql = "DELETE FROM users WHERE id_user = :id_user";
        $req = Database::getBdd()->prepare($sql);
        $req->bindParam(':id_user',$user);
        $req->execute();
    }

    function deleteVideoComments($video){
        $sql = "DELETE FROM comments WHERE id_video = :id_video";
        $req = Database::getBdd()->prepare($sql);
        $req->bindParam(':id_video',$video);
        $req->execute();
    }

    function deleteUserComments($id_user){
        $sql = "DELETE FROM comments WHERE id_user = :id_user";
        $req = Database::getBdd()->prepare($sql);
        $req->bindParam(':id_user',$id_user);
        $req->execute();
    }

    function authenticateUser($id_user,$password){
        $sql = "SELECT * FROM users WHERE username = :id_user AND password = :password";
        $req = Database::getBdd()->prepare($sql);
        $req->bindParam(':id_user',$id_user);
        $req->bindParam(':password',$password);
        $req->execute();
        return $req->fetchAll();
    }
    
    function alreadyExists($id_user){
        $sql = "SELECT * FROM users WHERE username = :id_user";
        $req = Database::getBdd()->prepare($sql);
        $req->bindParam(':id_user',$id_user);
        $req->execute();
        return $req->fetchAll();
    }

    function getFavourites($id_user){
        $sql = "SELECT * FROM favourites WHERE id_user = :id_user";
        $req = Database::getBdd()->prepare($sql);
        $req->bindParam(':id_user',$id_user);
        $req->execute();
        return $req->fetchAll();
    }
}
?>