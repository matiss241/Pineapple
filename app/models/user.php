<?php

class User
{

    /*Inserts provided email into database along with date time of subscription*/
    function signUp($POST)
    {
        $DB = new Database();

        $_SESSION['error'] = "";

        if (isset($POST['email'])) {
            $arr['email'] = $POST['email'];
            $arr['date'] = date("Y-m-d H:i:s");

            $query = "insert into users (email,date) values (:email,:date)";
            $data = $DB->write($query, $arr);

            if ($data) {
                header("Location:" . ROOT . "signedUp");
                die;
            }
        } else {
            $_SESSION['error'] = "Enter a valid email";
        }
    }

}
