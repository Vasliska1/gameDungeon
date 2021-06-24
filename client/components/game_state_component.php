<?php

define("ROOT_PATH", $_SERVER['DOCUMENT_ROOT']."/testVkontakte");
require_once ROOT_PATH."/server/db_сonnect.php";
require_once ROOT_PATH."/server/map/RoomRepository.php";
require_once ROOT_PATH."/server/item/SessionRepository.php";
require_once ROOT_PATH."/server/item/ItemRepository.php";

require_once "../Client.php";
global $server_output ;
session_start();
$state =Client::getResponse("get_state", array("id_room" => $_GET["id_room"], "id_session"=> $_SESSION["id_session"]));
    //RoomRepository::getState($_GET["id_room"], $_SESSION["id_session"]);

$rawRoom=Client::getResponse("get_room", array("id_room" => $_GET["id_room"], "id_session"=> $_SESSION["id_session"]));
$room = new Room($rawRoom->id, $rawRoom->roomObject, $rawRoom->left, $rawRoom->right, $rawRoom->up, $rawRoom->down, $rawRoom->isStart, $rawRoom->isFinish);///curl.getRoom($_GET["id_room"]);//RoomRepository::getRoom($_GET["id_room"]);

$hit = 0;

echo $_SESSION["id_session"];
$action = $_GET["action"];
/*
       $roomInfo = // get from DB
       $userInfo = // get from DB
       $monsterInfo = // get from DB*/

if ($action == "enter_room")
    //curl.setState()
    RoomRepository::setState($_GET["id_room"], "explored",  $_SESSION["id_session"]);


if ($action == "attack_monster") {

    $monster = ItemRepository::getMonster($_GET["id_room"]);
    $hitPlayer = rand(1, $monster->getPower() * 1.5);
    if ($state->getObjectPower() == -1) {
        RoomRepository::updatePowerObject($_GET["id_room"], $monster->getPower(), $_SESSION["id_session"]);
    }
    $state = RoomRepository::getState($_GET["id_room"],  $_SESSION["id_session"]);

    if ($state->getObjectPower() > $hitPlayer) {

        RoomRepository::updatePowerObject($_GET["id_room"], $monster->getPower() - $monster->getDecreaseStrength(), $_SESSION["id_session"]);
        RoomRepository::setState($_GET["id_room"], "attack_monster",  $_SESSION["id_session"]);
        $state = RoomRepository::getState($_GET["id_room"],  $_SESSION["id_session"]);
    } else {
        RoomRepository::setState($_GET["id_room"], "win_monster",  $_SESSION["id_session"]);
        $state = RoomRepository::getState($_GET["id_room"],  $_SESSION["id_session"]);
        SessionRepository::addPoints($_SESSION["id_session"], $state->getObjectPower());
        RoomRepository::setState($_GET["id_room"], "explored",  $_SESSION["id_session"]);
    }


}

// считываешь из базы состояние монстра
// расчет силы, процесс атаки
// update monster state state -> записываешь новую силу монстра в ббазу
if ($action == "open_chest"){

    $chest = ItemRepository::getChest($_GET["id_room"]);
    RoomRepository::setState($_GET["id_room"], "took_chest",  $_SESSION["id_session"]);
    SessionRepository::addPoints($_SESSION["id_session"], ItemRepository::getChest($_GET["id_room"])->getPoints());
    $state = RoomRepository::getState($_GET["id_room"],  $_SESSION["id_session"]);
    RoomRepository::setState($_GET["id_room"], "explored",  $_SESSION["id_session"]);

}


// update score player  ->  new score


/*
    $roomInfo = // get from DB
    $userInfo = // get from DB
    $monsterInfo = // get from DB*/


/*RoomState
    status: Entered


    room: Room (
        color:
        isUp:
        isDownm
        roomObject
)

    Player {
        score: 213
        name: "John"
}*/