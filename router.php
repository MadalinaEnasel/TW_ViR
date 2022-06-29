<?php

class Router
{

    static public function parse($url, $request)
    {
        $url = trim($url);

        if ($url == "/dailyvir/")
        {
            if(!isset($_SESSION['logged']))
            {
                $request->controller = "mains";
                $request->action = "about";
                $request->params = [];
            }
            else 
            {
                if ($_SESSION['logged'] == 0)
                {
                    $request->controller = "mains";
                    $request->action = "about";
                    $request->params = [];   
                }
                else
                {
                    $request->controller = "mains";
                    $request->action = "homepage";
                    $request->params = [];                       
                }
            }
        }
        else
        {
            $explode_url = explode('/', $url);
            $explode_url = array_slice($explode_url, 2);
            $request->controller = $explode_url[0];
            $request->action = $explode_url[1];
            $request->params = array_slice($explode_url, 2);
        }

    }
}
?>