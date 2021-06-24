<?php


class SessionDbHelper
{

    public function updateScore($idSession, $points)
    {

        $mysql = openDB();
        $sql = "UPDATE session SET `score` = `score` + '" . $points . "' WHERE `id_session` = '" . $idSession . "' ";
        $mysql->query($sql);

    }


    public function clearScore($idSession)
    {

        $mysql = openDB();
        $sql = "UPDATE session SET `score` = 0 WHERE `id_session` = '" . $idSession . "' ";
        $mysql->query($sql);
    }

    public function getScore($idSession)
    {/*
        $mysql = openDB();
        $sql = "CREATE TABLE IF NOT EXISTS session (id_session VARCHAR (30),name_player VARCHAR (20), score INT(30))";
        $mysql->query($sql);*/

        /*echo 121212;
        $sql = "CREATE TABLE IF NOT EXISTS chest (id_room INT(20),rarity VARCHAR(30), points INT)";
        $mysql->query($sql);
       */
        $mysql = openDB();
        $sql = "SELECT `score` FROM session WHERE `id_session` = '" . $idSession . "' ";
        $result = mysqli_query($mysql, $sql);
        $result = $result->fetch_array();
        $score = new Score($idSession, $result["score"]);
        return $score;
    }


    public function addNewSession($name)
    {

        $mysql = openDB();
        /* $sql = "CREATE TABLE session (
          id_session int NOT NULL AUTO_INCREMENT,
           name_player varchar(255),
         score int,
          PRIMARY KEY (id_session)
     )AUTO_INCREMENT=1;";*/


        $mysql = openDB();
        $sql = "INSERT INTO session (`name_player`, `score`) VALUES ( '" . $name . "', 0)";

        if (mysqli_query($mysql, $sql)) {
            $session_id = mysqli_insert_id($mysql);

        }
        return $session_id;
    }


}