<?php

class Database
{
    private $connection;

    function __construct()
    {
        try {
            $this->connection = new PDO(DB_TYPE . ":host=" . DB_HOST, DB_USER, DB_PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->createDB(DB_NAME);
            $this->connection = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
            $this->createTable("users");
        } catch (PDOException $e) {
            echo "Connection or creating db failed: " . $e->getMessage();
        }
    }

    /*Connects with database*/
    public function db_connect()
    {
        try {
            $string = DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";";

            return $db = new PDO($string, DB_USER, DB_PASS);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    /*Reads from database*/
    public function read($query, $data = [])
    {
        $DB = $this->db_connect();
        $statement = $DB->prepare($query);

        if (count($data) == 0) {
            $statement = $DB->query($query);
            $check = 0;

            if ($statement) {
                $check = 1;
            }
        } else {
            $check = $statement->execute($data);
        }

        if ($check) {

            return $statement->fetchAll(PDO::FETCH_OBJ);
        } else {

            return false;
        }
    }

    /*Writes to database*/
    public function write($query, $data = [])
    {
        $DB = $this->db_connect();
        $statement = $DB->prepare($query);

        if (count($data) == 0) {
            $statement = $DB->query($query);
            $check = 0;

            if ($statement) {
                $check = 1;
            }
        } else {
            $check = $statement->execute($data);
        }

        if ($check) {

            return true;
        } else {

            return false;
        }
    }

    /*Creates database*/
    public function createDB($name)
    {
        $createDB = "create database if not exists  $name";
        $this->connection->exec($createDB);
    }

    /*Creates table in database*/
    public function createTable($name)
    {
        try {
            $createTB = "create table if not exists $name( 
                        id bigint not null auto_increment,
                        email varchar(100) not null,
                        date datetime not null,
                        primary key (id))";
            $this->connection->exec($createTB);
        } catch (Exception $e) {
            echo "Adding record was not successful: " . $e->getMessage();
        }
    }
}
