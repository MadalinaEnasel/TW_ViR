<?php
class videosController extends Controller
{
    function create(){
        if(isset($_POST['create'])){

            require(ROOT . 'Models/Video.php');
            $videos = new Video();  

            $xmldoc = new DOMDocument();
            $xmldoc->load("Notifications.xml");
            $rss = $xmldoc->firstChild;
            $channel = $rss->firstElementChild;
            $newItem = $xmldoc->createElement("item");
            $channel->appendChild($newItem);
            $newElem = $xmldoc->createElement("title");
            $newItem->appendChild($newElem);
            $newText = $xmldoc->createTextNode("New video");
            $newElem->appendChild($newText);
            $newElem = $xmldoc->createElement("link");
            $newItem->appendChild($newElem);
            $newText = $xmldoc->createTextNode("/dailyvir/videos/view/".$_POST['urlPHP']);
            $newElem->appendChild($newText);
            $newElem = $xmldoc->createElement("description");
            $newItem->appendChild($newElem);
            $newText = $xmldoc->createTextNode($_SESSION['username']." posted a new video!");
            $newElem->appendChild($newText);
            $xmldoc->save("Notifications.xml");
            
            $videos->addVideo($_SESSION['username'],$_POST['urlPHP'],$_POST['titleUrlPHP'],$_POST['descriptionUrlPHP'],$_POST['categoryUrlPHP']);
        }

        $this->render("create");
    }

    function search($search){
        require(ROOT . 'Models/Video.php');

        $videos = new Video();
        $list = explode("777777",$search);
        $biglist = array();
        foreach($list as $l){
            $result = $videos->searchVideos($l);
            $biglist += $result;
        }
        $d['videos'] = $biglist;
        $this->set($d);
        $this->render("search");
    }
    
    function trending(){
        require(ROOT . 'Models/Video.php');

        $videos = new Video();

        $d['videos'] = $videos->trendingVideos();
        $this->set($d);
        $this->render("trending");
    }
    
    
    function stats($statsvideo){
        require(ROOT . 'Models/Video.php');

        $videos = new Video();

        $d['video'] = $videos->getVideoData($statsvideo);
        $d['stats'] = $videos->getVideoStats($statsvideo);
        $this->set($d);
        $this->render("stats");
    }

    function view($viewvideo){
        require(ROOT . 'Models/Video.php');

        $videos = new Video();
        $d['fav'] = $videos->favorited($_SESSION['username'],$viewvideo);
        if(isset($_POST['unfavourite'])){
            $videos->removeFavourite($_SESSION['username'],$_POST['id_videoPHP']);
        }
        if(isset($_POST['favourite'])){
            $videos->addFavourite($_SESSION['username'],$_POST['id_videoPHP'],$_POST['titlePHP']);
        }
        if(isset($_POST['comment']))
        {
            
            $xmldoc = new DOMDocument();

            $xmldoc->load("Notifications.xml");
            $rss = $xmldoc->firstChild;
            $channel = $rss->firstElementChild;
            $newItem = $xmldoc->createElement("item");
            $channel->appendChild($newItem);
            $newElem = $xmldoc->createElement("title");
            $newItem->appendChild($newElem);
            $newText = $xmldoc->createTextNode("New comment");
            $newElem->appendChild($newText);
            $newElem = $xmldoc->createElement("link");
            $newItem->appendChild($newElem);
            $newText = $xmldoc->createTextNode("/dailyvir/videos/view/".$viewvideo);
            $newElem->appendChild($newText);
            $newElem = $xmldoc->createElement("description");
            $newItem->appendChild($newElem);
            $newText = $xmldoc->createTextNode($_SESSION['username']." commented on a video!");
            $newElem->appendChild($newText);
            $xmldoc->save("Notifications.xml");

            $videos->addComment($_POST['id_videoPHP'],$_POST['commentPHP'],$_SESSION['username']);
        }
        if(isset($_POST['remove']))
        {
            $videos->removeComment($_POST['id_commentPHP']);
        }
        if(isset($_POST['delete']))
        {   
            $videos->deleteComments($viewvideo);
            $videos->deleteVideo($viewvideo);
            header("Location: /dailyvir/");
        }
        else
        {
            $videos->addView($viewvideo);
            $result = $videos->getUser($_SESSION['username']);
            if($result['gender'] == 'Male')
                $videos->addMaleView($viewvideo);
            if($result['gender'] == 'Female')
                $videos->addFemaleView($viewvideo);
            if($result['gender'] == 'Binary')
                $videos->addBinaryView($viewvideo);
            if($result['gender'] == 'Other')
                $videos->addOtherView($viewvideo);
            $d['video'] = $videos->getVideoData($viewvideo);
            $d['comments'] = $videos->getComments($viewvideo);
            $this->set($d);
            $this->render("view");
        }
    }
}
?>