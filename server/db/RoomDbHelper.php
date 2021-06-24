<?php


class RoomDbHelper
{

    private $mysql;

    public function __construct($mysql)
    {
        $this->mysql = $mysql;
    }

    public
    function getParamsMap($idRoom)
    {

        //  $sql = "INSERT INTO map (`id`, `room_object`,`left_room`, `right_room`, `up_room`, `down_room`, `is_start`, `is_finish`) VALUES (15, 'none', 14, 0, 0, 0, '0', '1' )";
        //$mysql->query($sql);

        $sql = "SELECT * FROM map WHERE `id` = '" . $idRoom . "' ";
        $result = mysqli_query($this->mysql, $sql);

        if(mysqli_num_rows($result) == 0){
            throw new Exception("Cannot find room");
        }

        $result = $result->fetch_array();
        $map = new Room($result["id"], $result["room_object"], $result["left_room"], $result["right_room"], $result["up_room"], $result["down_room"], $result["is_start"], $result["is_finish"]);

        return $map;

    }


    public
    function getState($idRoom, $sessionId)
    {
        $sql = "SELECT * FROM state_room WHERE (`id_room` = '" . $idRoom . "' AND `is_session` = '" . $sessionId . "') ";
        $result = mysqli_query($this->mysql, $sql);
        $result = $result->fetch_array();
        if(mysqli_num_rows($result) == 0){
            throw new Exception("Cannot find state");
        }
        $state = new StateRoom($result["id_room"], $result["state_room"], $result["is_session"], $result["object_power"]);

        return $state;
    }

    public
    function setNewStateInDB($idRoom, $state, $sessionId)
    {
        $sql = "UPDATE state_room SET `state_room` = '" . $state . "' WHERE `id_room` = '" . $idRoom . "' AND `is_session` = '" . $sessionId . "' ";
        $this->mysql->query($sql);
    }

    public
    function updateAllState($sessionId)
    {
//change
        for ($i = 1; $i <= 15; $i++) {
            $sql = "UPDATE state_room SET `state_room` = 'unexplored', `object_power`=-1 WHERE `id_room` = '" . $i . "' AND `is_session` = '" . $sessionId . "' ";
            $this->mysql->query($sql);
        }
    }

    public
    function addRoomStateForPlayer($session)
    {
        for ($i = 1; $i <= 15; $i++) {
            $sql = "INSERT INTO state_room (`is_session`, `id_room`,`state_room`, `object_power`) VALUES ('" . $session . "'," . $i . " , 'unexplored', 0 )";
            $this->mysql->query($sql);
        }
    }

    public
    function updatePowerObject($idRoom, $power, $session)
    {
        $sql = "UPDATE state_room SET `object_power` = '" . $power . "' WHERE `id_room` = '" . $idRoom . "' AND `is_session` = '" . $session . "'";
        $this->mysql->query($sql);
    }

}
