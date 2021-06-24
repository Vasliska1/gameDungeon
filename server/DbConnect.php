<?php

define("ROOT", $_SERVER['DOCUMENT_ROOT']."/testVkontakte");
class DbConnect
{
    private $host;
    private $username;
    private $password;


    public function __construct($host, $username, $password)
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        echo $this->password;
    }


    public function openDb()
    {
        try {


            $mysql = new mysqli($this->host, $this->username, $this->password);

            $sql = 'CREATE DATABASE game_vk';

            if (!mysqli_query($mysql, "DESCRIBE game_vk")) {
                mysqli_query($mysql, $sql);
            }
            $mysql->query("SET NAMES 'utf-8'");

            $db = mysqli_select_db($mysql, 'game_vk');
            if (!$db) {
                die ('Error select db : ' . mysqli_error());
            }


        } catch (mysqli_sql_exception $e) {
            echo 'Problems with connect to db: ' . $e->errorMessage;
            die();
        }

        return $mysql;

    }


}