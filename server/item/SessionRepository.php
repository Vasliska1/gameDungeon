<?php
require_once ROOT."/server/db/SessionDbHelper.php";

require_once "Score.php";
require_once "Session.php";

class SessionRepository
{
    public function addNewUserToSession($name)
    {

        return SessionDbHelper::addNewSession($name);

    }

    public function addPoints($idSession, $points)
    {
        SessionDbHelper::updateScore($idSession, $points);
    }

    public function clearScore($idSession)
    {
        SessionDbHelper::clearScore($idSession);

    }

    public function getScore($idSession)
    {
        return SessionDbHelper::getScore($idSession);

    }



}