<?php
require_once "Room.php";
require_once "StateRoom.php";
require_once ROOT."/server/db/RoomDbHelper.php";

class RoomRepository
{


    public function getRoom($idRoom)
    {
        return RoomDbHelper::getParamsMap($idRoom);

    }

    public function getState($idRoom, $sessionId)
    {

        return RoomDbHelper::getState($idRoom, $sessionId);
    }

    public function setState($idRoom, $state, $sessionId)
    {

        RoomDbHelper::setNewStateInDB($idRoom, $state, $sessionId);
    }

    public function updateState($session)
    {

        RoomDbHelper::updateAllState($session);
    }

    public function updatePowerObject($idRoom, $power, $session )
    {

        RoomDbHelper::updatePowerObject($idRoom, $power, $session);
    }

    public function addRoomStateForPlayer($session)
    {

        RoomDbHelper::addRoomStateForPlayer($session);
    }

}