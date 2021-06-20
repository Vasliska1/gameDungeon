<?php


//include('../config.php');

//use mysqli;

function openDB()
{/*
    try {
        global $host;
        global $username;
        global $password;

        $mysql = new mysqli($host, $username, $password);

        $sql = 'CREATE DATABASE gameForVk';

        if (!mysqli_query($mysql, "DESCRIBE gameForVk")) {
            mysqli_query($mysql, $sql);
        }
        $mysql->query("SET NAMES 'utf-8'");

        $db = mysqli_select_db($mysql, 'gameForVk');
        if (!$db) {
            die ('Error select db : ' . mysqli_error());
        }


    } catch (mysqli_sql_exception $e) {
        echo 'Problems with connect to db: ' . $e->errorMessage;
        die();
    }

    return $mysql;*/
}

