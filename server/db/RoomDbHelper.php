<?php


class RoomDbHelper
{

    public function getParamsMap($idRoom)
    {


        /* $defaultMap->setId(1);
         $defaultMap->setRoomObject("monster");
         $defaultMap->setDown(22);
         $defaultMap->setLeft(0);
         $defaultMap->setRight(4);
         $defaultMap->setUp(5);
         $defaultMap->setIsFinish(false);
         $defaultMap->setIsStart(true);*/
        $mysql = openDB();


        //  $sql = "INSERT INTO map (`id`, `room_object`,`left_room`, `right_room`, `up_room`, `down_room`, `is_start`, `is_finish`) VALUES (15, 'none', 14, 0, 0, 0, '0', '1' )";
        //$mysql->query($sql);


        $sql = "SELECT * FROM map WHERE `id` = '" . $idRoom . "' ";
        $result = mysqli_query($mysql, $sql);
        $result = $result->fetch_array();
        $defaultMap = new Room($result["id"], $result["room_object"], $result["left_room"], $result["right_room"], $result["up_room"], $result["down_room"], $result["is_start"], $result["is_finish"]);

        return $defaultMap;

    }


    public
    function getState($idRoom, $sessionId)
    {

        $mysql = openDB();
        /* $sql = "CREATE TABLE IF NOT EXISTS state_room (is_session VARCHAR (30),id_room INT(20),state_room VARCHAR(30),object_power VARCHAR(30) )";
         $mysql->query($sql);*/


        $sql = "SELECT * FROM state_room WHERE (`id_room` = '" . $idRoom . "' AND `is_session` = '".$sessionId."') ";
        $result = mysqli_query($mysql, $sql);
        $result = $result->fetch_array();

        $state = new StateRoom($result["id_room"], $result["state_room"], $result["is_session"], $result["object_power"]);

        return $state;
    }

    public
    function setNewStateInDB($idRoom, $state, $sessionId)
    {

        $mysql = openDB();

        $sql = "UPDATE state_room SET `state_room` = '" . $state . "' WHERE `id_room` = '" . $idRoom . "' AND `is_session` = '" . $sessionId . "' ";
        $mysql->query($sql);
    }

    function updateAllState($sessionId)
    {
        $mysql = openDB();
//change
        for ($i = 1; $i <= 15; $i++) {
            $sql = "UPDATE state_room SET `state_room` = 'unexplored', `object_power`=-1 WHERE `id_room` = '" . $i . "' AND `is_session` = '" . $sessionId . "' ";
            $mysql->query($sql);
        }
    }

    function addRoomStateForPlayer($session)
    {
        $mysql = openDB();
        for ($i = 1; $i <= 15; $i++) {
            $sql = "INSERT INTO state_room (`is_session`, `id_room`,`state_room`, `object_power`) VALUES ('".$session."'," . $i . " , 'unexplored', 0 )";
            $mysql->query($sql);
        }
    }

    function updatePowerObject($idRoom, $power, $session){

        $mysql = openDB();
        $sql = "UPDATE state_room SET `object_power` = '" . $power . "' WHERE `id_room` = '" . $idRoom . "' AND `is_session` = '" . $session . "'";
        $mysql->query($sql);
    }

}
