<?php

class Home extends Controller
{
    function index()
    {
        $data['page_title'] = "home";
        if (isset($_POST['email'])) {
            $user = $this->loadModel("user");
            $user->signup($_POST);
        }
        $this->view("home", $data);
    }
}
