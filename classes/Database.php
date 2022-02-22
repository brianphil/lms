<?php

class Database
{
    private $host;
    private $user;
    private $pass;
    private $db;
    public $mysqli;
    public function __construct()
    {
        $this->db_connect();
    }


    private function db_connect()
    {
        $this->host = 'localhost';
        $this->user = 'root';
        $this->pass = '';
        $this->db = 'test';

        $this->mysqli = new mysqli($this->host, $this->user, $this->pass, $this->db);
        return $this->mysqli;
    }

    public function login($uname, $pswd)
    {
        $login_query = "SELECT * FROM users WHERE username = '$uname' AND password = '$pswd'";
        $result = $this->mysqli->query($login_query);

        if ($result) {
            return $result->fetch_array();
        } else {
            return false;
        }
    }
}
