<?php
require('../vendor/autoload.php');

$clientId = "ad898bb7e7d97f4754b30472988e08bb712cf29e";
$clientSecret = "hMrbM88paECWfPndd4QK2EKTmz/rTqbTF4L5G1JFhoYFujNcSb6sTC2qTyoAIfqan257lcXRLKP3jfYDQzgJpgCz9EO6oHhyI6sgdOn1g7/Sp4rwXPzOL5qF3Nmr2q+/";
$accessToken = "121d9198e72e2a08ab49e987468fe85d";

use Vimeo\Vimeo;
use Vimeo\Exceptions\VimeoUploadException;

if(isset($_POST['upload-btn'])){
    $client = new Vimeo($clientId,$clientSecret,$accessToken);
    $response = $client->request('/tutorial', array(), 'GET');
    
    $file = $_FILES['file1']['name'];  
    $tmp = $_FILES['file1']['tmp_name'];
    
	$title = $_POST['title'];
	$desc = $_POST['description'];
    
	$uri = $client->upload($tmp, array(
		"name" => "$title",
		"description" => "$desc",
    ));

    $response = $client->request($uri . '?fields=transcode.status');

    if ($response['body']['transcode']['status'] === 'complete') {
        print 'Your video finished transcoding.';
    } 
    elseif ($response['body']['transcode']['status'] === 'in_progress') {
        print 'Video Uploading Done. (your video is still processing..please try to access your video after few minutes)';
    }
    else {
	   print 'Your video encountered an error during transcoding.';
    }
    
    $response = $client->request($uri . '?fields=link');
    $video_link = $response['body']['link'];
    
    $get_vid_id = explode("/",$video_link);
    
    $get_vid_id = $get_vid_id['3'];


    //database insert
    $connection = mysqli_connect('localhost','root','','video');

    $sql = "INSERT INTO video(id_video,title,description,category,tags,views,comment_count) VALUES ('$get_vid_id','$title','$desc','','',0,0)";

    $run = mysqli_query($connection,$sql);

    if($run){
        echo "data inserted";
    }
    else{
        echo mysqli_error($connection);
    }


}
?>

<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Upload</title>
    <link rel="stylesheet" href="upload_video.css">
</head>
<body>
<div class="menuBar">
    <div class="left">
        <a href="../Home%20Page/home_page.html"><img class="logo" src="camera.png" alt="The src doesn't exist"></a>
        <a class="text--logo" href="../Home%20Page/home_page.html" target="_self">DailyViR</a>

        <div role="search" class="search">
            <label for="search"> </label><input type="search" id="search" name="search" placeholder="Search...">
            <a href="../Home%20Page/home_page.html"><img src="search.png" class="search__icon"
                                                         alt="The src doesn't exist"></a>
        </div>

        <a><img src="menu.png" class="menu__icon" alt="The src doesn't exist"></a>


    </div>

    <div class="right">

        <a href="../Profile%20User/user_profile.html"><img src="image.png" class="profile-account"
                                                           alt="The src doesn't exist"></a>

        <a href="notifications.html"><img src="notifications.png" class="notifications__icon"
                                          alt="The src doesn't exist"></a>

        <a class="trendingButton" href="../Trending/trending_page.html.html" target="_self">Trending</a>

    </div>
</div>
<div class="container">
    <div class="column">
        <form action='upload_video.php' method='post' enctype="multipart/form-data">
            <div>
                <input type='file' name='file1' accept="video/*">
            </div>
            <div class="txt_field">
                <input input type="text" name="title" placeholder="Title...">
            </div>
            <div class="txt_field">
                <input type="text" name="description" placeholder="Description...">
            </div>
            <button type='submit' name='upload-btn'>Upload</button>
        </form>
    </div>
</body>
</html>
