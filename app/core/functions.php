<?php

/*Validates email depending on input*/

function validateEmail($email, $checkbox)
{
    /*Checks if email input is not empty*/
    if ($email != '') {
        /*Checks if email is valid*/
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $domain = explode('.', $email);
            /*Checks if email doesn't end with .co*/
            if ($domain[$domain . length - 1] != 'co') {
                /*Checks if TOS checkbox is checked*/
                if ($checkbox) {

                } else {
                    $_SESSION['error'] = "You must accept the terms and conditions";
                }
            } else {
                $_SESSION['error'] = "We are not accepting subscriptions from Colombia emails";
            }
        } else {
            $_SESSION['error'] = "Please provide a valid e-mail address";
        }
    } else {
        $_SESSION['error'] = "Email address is required";
    }
}

/*Returns email providers for email filtering with buttons*/

function getAllProviders($data = '')
{
    $email_providers = [];
    foreach ($data as $row) {
        $email = explode('@', $row->email);
        $domain = array_pop($email);
        $provider = explode('.', $domain);
        $domain = array_shift($provider);

        if (!in_array($domain, $email_providers)) {
            array_push($email_providers, $domain);
        }
    }
    if (is_array($email_providers)) {
        return $email_providers;
    }
    return false;
}

/*Returns email provider after whole email is provided for the function*/

function getOneProvider($data = '')
{
    $email = explode('@', $data);
    $domain = array_pop($email);
    $provider = explode('.', $domain);
    $domain = array_shift($provider);
    return $domain;
}

/*Prints error message*/

function check_message()
{
    if (isset($_SESSION['error']) && $_SESSION['error'] != "") {
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }
}
