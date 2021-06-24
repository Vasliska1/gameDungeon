<?php


class Repository
{
    private $dbRoom;
    private $dbItem;
    private $dbSession;


    public function __construct($dbRoom, $dbItem, $dbSession)
    {
        $this->dbRoom = $dbRoom;
        $this->dbItem = $dbItem;
        $this->dbSession = $dbSession;
    }


    public function getChest($idRoom)
    {
        return $this->dbItem->getChestFromDb($idRoom);

    }

    public function getMonster($idRoom)
    {

        return $this->dbItem->getMonsterFromDb($idRoom);
    }

    public function getRoom($idRoom)
    {
        return $this->dbRoom->getParamsMap($idRoom);

    }

    public function getState($idRoom, $sessionId)
    {

        return $this->dbRoom->getState($idRoom, $sessionId);
    }

    public function setState($idRoom, $state, $sessionId)
    {

        $this->dbRoom->setNewStateInDB($idRoom, $state, $sessionId);
    }

    public function updateState($session)
    {

        $this->dbRoom->updateAllState($session);
    }

    public function updatePowerObject($idRoom, $power, $session)
    {

        $this->dbRoom->updatePowerObject($idRoom, $power, $session);
    }

    public function addRoomStateForPlayer($session)
    {

        $this->dbRoom->addRoomStateForPlayer($session);
    }

    public function addNewUserToSession($name)
    {

        return $this->dbSession->addNewSession($name);

    }

    public function addPoints($idSession, $points)
    {
        $this->dbSession->updateScore($idSession, $points);
    }

    public function clearScore($idSession)
    {
        $this->dbSession->clearScore($idSession);

    }

    public function getScore($idSession)
    {
        return $this->dbSession->getScore($idSession);

    }

}