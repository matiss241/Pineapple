<?php

class Home extends Controller
{
    function index()
    {
        $data['page_title'] = "Home";

        if (isset($_POST['email'])) {
            validateEmail($_POST['email']);
            $user = $this->loadModel("user");
            $user->signUp($_POST);
        }
        $this->view("home", $data);
    }
}
