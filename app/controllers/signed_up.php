<?php

class Signed_up extends Controller
{
    function index()
    {
        $data['page_title'] = "Signed up";
        $this->view("signed_up", $data);
    }
}
