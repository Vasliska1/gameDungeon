<?php

class Config
{
    private $host;
    private $username;
    private $password;

    public function __construct()
    {
        getenv('MYSQL_DBHOST') ? $db_host = getenv('MYSQL_DBHOST') : $db_host = "localhost";
        getenv('MYSQL_DBPORT') ? $db_port = getenv('MYSQL_DBPORT') : $db_port = "3306";
        getenv('MYSQL_DBUSER') ? $db_user = getenv('MYSQL_DBUSER') : $db_user = "root";
        getenv('MYSQL_DBPASS') ? $db_pass = getenv('MYSQL_DBPASS') : $db_pass = "";
        getenv('MYSQL_DBNAME') ? $db_name = getenv('MYSQL_DBNAME') : $db_name = "";

        $this->host = $db_host;
        $this->username = $db_user;
        $this->password = $db_pass;
    }

    /**
     * @return array|false|string
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @return array|false|string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return array|false|string
     */
    public function getPassword()
    {
        return $this->password;
    }


}

