<?php

class SignedUp extends Controller
{
    function index()
    {
        $data['page_title'] = "Signed up";
        $this->view("signedUp", $data);
    }
}
