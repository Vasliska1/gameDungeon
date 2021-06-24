<?php


class ItemDbHelper
{

    public function getChestFromDb($idRoom)
    {
        $mysql = openDB();
        /*echo 121212;
        $sql = "CREATE TABLE IF NOT EXISTS chest (id_room INT(20),rarity VARCHAR(30), points INT)";
        $mysql->query($sql);
       */

        $sql = "SELECT * FROM chest WHERE `id_room` = '" . $idRoom . "' ";
        $result = mysqli_query($mysql, $sql);
        $result = $result->fetch_array();
        $chest = new Chest($idRoom,  $result["rarity"],$result["points"]);


        return $chest;
    }


    public function getMonsterFromDb($idRoom)
    {
        $mysql = openDB();

        /*$sql = "INSERT INTO monster (`id_room`, `type_monster`,`power`) VALUES (13, 'almighty', 16 )";
        $mysql->query($sql);
        */


        $sql = "SELECT * FROM monster WHERE `id_room` = '" . $idRoom . "' ";
        $result = mysqli_query($mysql, $sql);
        $result = $result->fetch_array();


        $monster = new Monster($idRoom, $result["type_monster"], $result["power"], sqrt($result["power"]));


        return $monster;
    }

}