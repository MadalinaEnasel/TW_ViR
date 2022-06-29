<?php
class mainsController extends Controller
{
    function about()
    {
        require(ROOT . 'Models/Main.php');

        $main = new Main();

        $this->render("about");
    }

    function development()
    {
        require(ROOT . 'Models/Main.php');

        $main = new Main();

        $this->render("development");
    }

    function howto()
    {
        require(ROOT . 'Models/Main.php');

        $main = new Main();

        $this->render("howto");
    }

    function concept()
    {
        require(ROOT . 'Models/Main.php');

        $main = new Main();

        $this->render("concept");
    }

    function homepage()
    {
        require(ROOT . 'Models/Main.php');

        $main = new Main();

        $d['videos'] = $main->homepageVideos();
        $this->set($d);
        $this->render("homepage");
    }
}
?>