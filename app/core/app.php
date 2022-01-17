<?php

class App
{
    /*Default url path, method, and parameters*/
    private $controller = "home";
    private $method = "index";
    private $params = [];

    public function __construct()
    {
        /*If entered url exists, redirect user to that page*/
        $url = $this->splitURL();

        if (file_exists("../app/controllers/" . strtolower($url[0]) . ".php")) {
            $this->controller = strtolower($url[0]);
            unset($url[0]);
        }
        /*If entered url doesn't exist, user is redirected to default page*/
        require "../app/controllers/" . $this->controller . ".php";
        $this->controller = new $this->controller;

        /*Checks for called methods*/
        if (isset($url[1])) {

            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }
        $this->params = array_values($url);
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    /*Splits url*/
    private function splitURL()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : "home";

        return explode("/", filter_var(trim($url, "/"), FILTER_SANITIZE_URL));
    }
}
