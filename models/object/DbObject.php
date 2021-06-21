<?php


class DbObject
{

    public function getChestFromDb($idRoom)
    {
        $mysql = openDB();
        /*echo 121212;
        $sql = "CREATE TABLE IF NOT EXISTS chest (id_room INT(20),rarity VARCHAR(30), points INT)";
        $mysql->query($sql);
       */


        $chest = new Chest();
        $chest->setIdRoom($idRoom);


        $sql = "SELECT * FROM chest WHERE `id_room` = '" . $idRoom . "' ";
        if ($result = mysqli_query($mysql, $sql)) {
            $result = $result->fetch_array();
            $chest->setPoints($result["points"]);
            $chest->setRarity($result["rarity"]);
        }

        return $chest;
    }


    public function getMonsterFromDb($idRoom)
    {
        $mysql = openDB();

        /*$sql = "INSERT INTO monster (`id_room`, `type_monster`,`power`) VALUES (13, 'almighty', 16 )";
        $mysql->query($sql);
        */
        $monster = new Monster();

        $monster->setIdRoom($idRoom);


        $sql = "SELECT * FROM monster WHERE `id_room` = '" . $idRoom . "' ";
        if ($result = mysqli_query($mysql, $sql)) {
            $result = $result->fetch_array();
            $monster->setType($result["type_monster"]);
            $monster->setPower($result["power"]);
        }
        $monster->setDecreaseStrength(sqrt($monster->getPower()));
        return $monster;
    }

}