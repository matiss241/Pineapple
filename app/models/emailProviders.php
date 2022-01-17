<?php

class EmailProviders
{

    /*Returns all emails from database*/
    function emailProviders()
    {
        $query = "select email from users ";
        $DB = new Database();
        $data = $DB->read($query);
        $data = getAllProviders($data);

        if (is_array($data)) {

            return $data;
        }

        return false;
    }
}
