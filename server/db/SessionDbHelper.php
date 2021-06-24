<?php


class SessionDbHelper
{
    private $mysql;

    public function __construct($mysql)
    {
        $this->mysql = $mysql;
    }

    public function updateScore($idSession, $points)
    {
        $sql = "UPDATE session SET `score` = `score` + '" . $points . "' WHERE `id_session` = '" . $idSession . "' ";
        $this->mysql->query($sql);
    }

    public function clearScore($idSession)
    {
        $sql = "UPDATE session SET `score` = 0 WHERE `id_session` = '" . $idSession . "' ";
        $this->mysql->query($sql);
    }

    public function getScore($idSession)
    {
        $sql = "SELECT `score` FROM session WHERE `id_session` = '" . $idSession . "' ";
        $result = mysqli_query($this->mysql, $sql);
        $result = $result->fetch_array();
        if (empty($result)) {
            throw new Exception("Cannot find score");
        }
        $score = new Score($idSession, $result["score"]);
        return $score;
    }

    public function addNewSession($name)
    {
        $sql = "INSERT INTO session (`name_player`, `score`) VALUES ( '" . $name . "', 0)";

        if (mysqli_query($this->mysql, $sql)) {
            $session_id = mysqli_insert_id($this->mysql);
        }
        return $session_id;
    }
}