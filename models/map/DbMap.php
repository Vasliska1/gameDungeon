<?php


class DbMap
{

    public function getParamsMap($idRoom)
    {


        $defaultMap = new DefaultMap();
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
        if ($result = mysqli_query($mysql, $sql)) {
            $result = $result->fetch_array();
            $defaultMap->setId($result["id"]);
            $defaultMap->setRoomObject($result["room_object"]);
            $defaultMap->setDown($result["down_room"]);
            $defaultMap->setLeft($result["left_room"]);
            $defaultMap->setRight($result["right_room"]);
            $defaultMap->setUp($result["up_room"]);
            $defaultMap->setIsFinish($result["is_finish"]);
            $defaultMap->setIsStart($result["is_start"]);
        }


        return $defaultMap;

    }


    public function getState($idRoom)
    {
        $mysql = openDB();
        // $sql = "CREATE TABLE IF NOT EXISTS state_room (id INT(20),state VARCHAR(30))";

        $state = new StateMapDefault();
        $state->setId($idRoom);


        $sql = "SELECT * FROM state_room WHERE `id` = '" . $idRoom . "' ";
        if ($result = mysqli_query($mysql, $sql)) {
            $result = $result->fetch_array();
            $state->setState($result["state"]);


        }
        return $state;
    }

    public
    function setNewStateInDB($idRoom)
    {
        $mysql = openDB();
        $sql = "UPDATE state_room SET `state` = 'explored' WHERE `id` = '" . $idRoom . "' ";
        $mysql->query($sql);
    }

    function updateAllState(){
        $mysql = openDB();

        for($i=1;$i<15;$i++) {
            $sql = "UPDATE state_room SET `state` = 'unexplored' WHERE `id` = '" . $i . "' ";
            $mysql->query($sql);
        }
    }

}
