<?php

require_once "../db/ItemDbHelper.php";
require_once "../db/RoomDbHelper.php";
require_once "../db/SessionDbHelper.php";
require_once "../DbConnect.php";
require_once "../config.php";
require_once "../Repository.php";
require_once "action/GetStateAction.php";
require_once "action/AttackMonsterAction.php";
require_once "action/CreateSessionAction.php";
require_once "action/GetScoreAction.php";
require_once "action/OpenChestAction.php";
require_once "action/RestartAction.php";
require_once "action/EnterRoomAction.php";
require_once "action/GetRoomAction.php";
require_once "action/ServerAction.php";

require_once "../../common/StateRoom.php";
require_once "../../common/Score.php";
require_once "../../common/Monster.php";
require_once "../../common/Room.php";
require_once "../../common/Session.php";
require_once "../../common/Chest.php";


$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : null;
$roomId = isset($_REQUEST['id_room']) ? $_REQUEST['id_room'] : null;
$session = isset($_REQUEST['id_session'])? $_REQUEST['id_session'] : null ;
$namePlayer = isset($_REQUEST['name_player']) ? $_REQUEST['name_player'] : null ;

global $host;
global $username;
global $password;

$db = new DbConnect($host, $username, $password);
$dbConnect = $db->openDb();

$dbRoom = new RoomDbHelper($dbConnect);
$dbItem = new ItemDbHelper($dbConnect);
$dbSession = new SessionDbHelper($dbConnect);

$repository = new Repository($dbRoom, $dbItem, $dbSession);

try {
    $result = processRequest($repository, $action, $roomId, $session, $namePlayer)->processAction();
    http_response_code($result->code);
    echo json_encode($result->result, 16);
} catch (Exception $ex) {
    http_response_code(500);
    echo "Error:". $ex;
}


function processRequest($repository, $action, $roomId, $session, $username) {
    $actionObject = null;

    switch ($action) {
        case "get_room":
            $actionObject = new GetRoomAction($repository, $roomId, $session, $username);
            break;
        case "get_state":
            $actionObject = new GetStateAction($repository, $roomId, $session, $username);
            break;
        case "enter_room":
            $actionObject =  new EnterRoomAction($repository, $roomId, $session, $username);
            break;
        case "open_chest":
            $actionObject = new OpenChestAction($repository, $roomId, $session, $username);
            break;
        case "attack_monster":
            $actionObject = new AttackMonsterAction($repository, $roomId, $session, $username);
            break;
        case "get_score":
            $actionObject = new GetScoreAction($repository, $roomId, $session, $username);
            break;
        case "create_session":
            $actionObject = new CreateSessionAction($repository, $roomId, $session, $username);
            break;
        case "restart":
            $actionObject = new RestartAction($repository, $roomId, $session, $username);
    }
    return $actionObject;
  // echo json_encode($actionObject->processAction(), 16);
}

/*
switch ($action) {

    case "get_room":
        $roomId = $_POST["id_room"];

        //echo 'roomid:'. $roomId;
        $room = RoomRepository::getRoom($roomId);

        echo json_encode($room, 16);
        break;
    case "get_state":
        $state = RoomRepository::getState($_POST["id_room"], $_POST["id_session"]);
        echo json_encode($state, 16);
        break;
    case "enter_room":
        RoomRepository::setState($_POST["id_room"], "explored", $_POST["id_session"]);
        echo http_response_code(200);
        break;

    case "open_chest":

        $chest = ItemRepository::getChest($_POST["id_room"]);
        RoomRepository::setState($_POST["id_room"], "took_chest", $_POST["id_session"]);
        SessionRepository::addPoints($_POST["id_session"], ItemRepository::getChest($_POST["id_room"])->getPoints());
        echo json_encode($chest, 16);
        break;
    case "attack_monster":

        $monster = ItemRepository::getMonster($_POST["id_room"]);
        $hitPlayer = rand(1, $monster->getPower()*1.5);
        $state = RoomRepository::getState($_POST["id_room"], $_POST["id_session"]);
        if ($state->getObjectPower() == -1) {
            RoomRepository::updatePowerObject($_POST["id_room"], $monster->getPower(), $_POST["id_session"]);
        }
        $state = RoomRepository::getState($_POST["id_room"], $_POST["id_session"]);

        if ($state->getObjectPower() > $hitPlayer) {

            RoomRepository::updatePowerObject($_POST["id_room"], $state->getObjectPower() - $monster->getDecreaseStrength(), $_POST["id_session"]);
            RoomRepository::setState($_POST["id_room"], "attack_monster", $_POST["id_session"]);

        } else {


            SessionRepository::addPoints($_POST["id_session"], $state->getObjectPower());
            RoomRepository::setState($_POST["id_room"], "win_monster", $_POST["id_session"]);
            //echo  $state->getObjectPower();
        }

        echo json_encode(array('monster' => $monster, 'hit' => $hitPlayer), 16);
        break;
    case "get_score":
        $score = SessionRepository::getScore($_POST["id_session"]);
        echo json_encode($score, 16);
        break;

    case "create_session":
       $session =  SessionRepository::addNewUserToSession($_POST["name_player"]);
        RoomRepository::addRoomStateForPlayer( $session);

        echo json_encode($session);
        break;
    case "restart":
        RoomRepository::updateState( $_POST["id_session"]);
        SessionRepository::clearScore($_POST["id_session"]);

        echo http_response_code(200);
        break;



}
*/

/*if ($action == "attack_monster") {
    $monster = ItemRepository::getMonster($_POST["id_room"]);
    $hitPlayer = rand(1, $monster->getPower() - 1);
    $state = RoomRepository::getState($_POST["id_room"], $_POST["id_session"]);
    if ($state->getObjectPower() == -1) {
        RoomRepository::updatePowerObject($_POST["id_room"], $monster->getPower(), $_POST["id_session"]);
    }
    if ($state->getObjectPower() > $hitPlayer) {

        RoomRepository::updatePowerObject($_POST["id_room"], $monster->getPower() - $monster->getDecreaseStrength(), $_POST["id_session"]);
        RoomRepository::setState($_POST["id_room"], "attack_monster", $_POST["id_session"]);

    } else {
        RoomRepository::setState($_POST["id_room"], "win_monster", $_POST["id_session"]);
        SessionRepository::addPoints($_POST["id_session"], $state->getObjectPower());
    }

    echo json_encode($monster, 16);

} elseif
($action == "get_score") {
    $score = SessionRepository::getScore($_POST["id_session"]);
    echo json_encode($score, 16);
} elseif
($action == "open_chest") {
    $chest = ItemRepository::getChest($_POST["id_room"]);
    RoomRepository::setState($_POST["id_room"], "took_chest", $_POST["id_session"]);
    SessionRepository::addPoints($_POST["id_session"], ItemRepository::getChest($_POST["id_room"])->getPoints());
    echo json_encode($chest, 16);
} elseif
($action == "enter_room") {
    RoomRepository::setState($_POST["id_room"], "explored", $_POST["id_session"]);
    echo http_response_code(200);
} elseif
($action == "get_room") {
    $roomId = $_POST["id_room"];

//echo 'roomid:'. $roomId;
    $room = RoomRepository::getRoom($roomId);

    echo json_encode($room, 16);
} elseif
($action == "get_state") {
    $state = RoomRepository::getState($_POST["id_room"], $_POST["id_session"]);
    echo json_encode($state, 16);
}*/