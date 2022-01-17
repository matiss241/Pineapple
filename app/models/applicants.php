<?php

class Applicants
{

    /*Gets all elements from database*/
    function get_all($POST = '')
    {
        $sort = 'date';

        if (isset($POST)) {
            $sort = $POST;
        }

        $query = "select * from users order by $sort asc";

        $DB = new Database();
        $data = $DB->read($query);

        if (is_array($data)) {

            return $data;
        }

        return false;
    }

    /*Deletes elements from database that had been checked*/
    function deleteRecords($POST)
    {
        $DB = new Database();
        $data = [];
        $all_id = $POST;

        foreach ($all_id as $id) {
            $query = "delete from users where id = $id";
            $data = $DB->write($query);
        }

        if ($data) {
            header("Location:" . ROOT . "showDatabase");
            die;
        }
    }

    /*Returns searched email from database if one exists*/
    function getEmail($POST, $flag)
    {
        $DB = new Database();
        $data = [];


        $query = "select * from users where email = '$POST'";
        $data = $DB->read($query);

        if (is_array($data)) {

            if ($flag == 'true') {

                return $data[0];
            }

            return $data;
        }

        return false;
    }

    /*Returns all emails from database with required provider*/
    function specificEmails($provider = '')
    {
        $DB = new Database();

        $query = "select * from users";
        $data = $DB->read($query);
        $valid_emails = [];
        foreach ($data as $a => $b) {
            $email = $b->email;

            if ($provider == getOneProvider($email)) {
                array_push($valid_emails, $email);
            }
        }
        $data = [];

        foreach ($valid_emails as $a) {
            array_push($data, $this->getEmail($a, 'true'));
        }

        return $data;
    }

}
