<?php



class DbMap
{

    public function getParamsMap($idRoom){

        $defaultMap = new DefaultMap();
        $defaultMap->setId(1);
        $defaultMap->setRoomObject("chest");
        $defaultMap->setDown(22);
        $defaultMap->setLeft(0);
        $defaultMap->setRight(4);
        $defaultMap->setUp(5);
        $defaultMap->setIsFinish(false);
        $defaultMap->setIsStart(true);
       /* $mysql = openDB();

        $sql = "SELECT * FROM map WHERE `id` = '".$idRoom."' ";
        if($result = mysqli_query($this->mysql, $sql)){
            $defaultMap->setId($result["id"]);
            $defaultMap->setRoomObject($result["room_object"]);
            $defaultMap->setDown($result["down"]);
            $defaultMap->setLeft($result["left"]);
            $defaultMap->setRight($result["right"]);
            $defaultMap->setUp($result["up"]);
            $defaultMap->setIsFinish($result["is_finish"]);
            $defaultMap->setIsStart($result["is_start"]);}*/

        return $defaultMap;

    }


    public function getState($idRoom){

        $state = new StateMapDefault();
        $state->setId($idRoom);
        $state->setState("unexplored");
          /* $mysql = openDB();

        $sql = "SELECT * FROM game_state WHERE `id` = '".$idRoom."' ";
        if($result = mysqli_query($this->mysql, $sql)){
            $state->setState($result["state"]);
        */
        return $state;
    }


}
