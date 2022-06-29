<?php
class usersController extends Controller
{
    function login()
    {
        if(isset($_POST['login']))
        {
            if($_POST['login'] == 1)
            {
                require(ROOT . 'Models/User.php');
                $users = new User();
                $username = $_POST['usernamePHP'];
                $password = $_POST['passwordPHP'];
                if($users->authenticateUser($username,$password)){
                    $_SESSION['logged'] = 1;
                    $_SESSION['username'] = $username;
                }

            }
        }

        $this->render("login");
    }

    function signup()
    {
        if(isset($_POST['signup'])){
            if($_POST['signup'] == 1)
            {
                require(ROOT . 'Models/User.php');
                $users = new User();
                if(!$users->alreadyExists($_POST['usernamePHP']))
                {
                    $_SESSION['logged'] = 1;
                    $_SESSION['username'] = $_POST['usernamePHP'];
                    $xmldoc = new DOMDocument();
                    $xmldoc->load("Notifications.xml");
                    $rss = $xmldoc->firstChild;
                    $channel = $rss->firstElementChild;
                    $newItem = $xmldoc->createElement("item");
                    $channel->appendChild($newItem);
                    $newElem = $xmldoc->createElement("title");
                    $newItem->appendChild($newElem);
                    $newText = $xmldoc->createTextNode("New user");
                    $newElem->appendChild($newText);
                    $newElem = $xmldoc->createElement("link");
                    $newItem->appendChild($newElem);
                    $newText = $xmldoc->createTextNode("/dailyvir");
                    $newElem->appendChild($newText);
                    $newElem = $xmldoc->createElement("description");
                    $newItem->appendChild($newElem);
                    $newText = $xmldoc->createTextNode($_SESSION['username']." joined our community!");
                    $newElem->appendChild($newText);
                    $xmldoc->save("Notifications.xml");
                    $result = $users->addUser($_POST['usernamePHP'],$_POST['genderPHP'],$_POST['emailPHP'],$_POST['passwordPHP'],$_POST['countryPHP'],);
                }
            }
        }

        $this->render("signup");
    }

    function view()
    {
        if(isset($_POST['logout'])){
            if($_POST['logout']==1){
                require(ROOT . 'Models/User.php');
                $users = new User();
                $_SESSION['logged'] = 0;
            }
        }
        if(isset($_POST['changePassword'])){
            if($_POST['changePassword']==1){
                require(ROOT . 'Models/User.php');
                $users = new User();
                $users->changePassword($_SESSION['username'],$_POST['newPasswordPHP']);
            }
        }
        if(isset($_POST['changeEmail'])){
            if($_POST['changeEmail']==1){
                require(ROOT . 'Models/User.php');
                $users = new User();
                $users->changeEmail($_SESSION['username'],$_POST['newEmailPHP']);
            }
        }
        if(isset($_POST['export']))
        {
            require(ROOT . 'Models/User.php');
            $users = new User();
            $file = $_SESSION['username'].".csv";
            $txt = fopen($file, "w") or die("Unable to open file!");
            header('Content-Description: File Transfer');
            header('Content-Disposition: attachment; filename='.basename($file));
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            header("Content-Type: text/csv");
            fwrite($txt, "id_user, id_video, title\n");
            $results = $users->getFavourites($_SESSION['username']);
            foreach($results as $result){
                fwrite($txt, $result['id_user'].",".$result['id_video'].",".$result['title']."\n");
            }
            fclose($txt);
            readfile($file);

        }

        $this->render("view");
    }

    function studio()
    {
        require(ROOT . 'Models/User.php');

        $users = new User();
        $d['videos'] = $users->userVideos($_SESSION['username']);
        $this->set($d);
        $this->render("studio");
    }
}
?>