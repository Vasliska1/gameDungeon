<?php
require_once "DbMap.php";
require_once "DefaultMap.php";
require_once "StateMapDefault.php";

class GeneratingRoom
{


    public function getRoom($idRoom)
    {
        return DbMap::getParamsMap($idRoom);

    }

    public function getState($idRoom){

        return DbMap::getState($idRoom);
    }

    public function setState($idRoom){

        DbMap::setNewStateInDB($idRoom);
    }

    public function updateState(){

        DbMap::updateAllState();
    }


}