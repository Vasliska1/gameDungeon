<?php

require_once "../db/ItemDbHelper.php";
require_once "../db/RoomDbHelper.php";
require_once "../db/SessionDbHelper.php";
require_once "../db/DbConnect.php";
require_once "../Config.php";
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
$session = isset($_REQUEST['id_session']) ? $_REQUEST['id_session'] : null;
$namePlayer = isset($_REQUEST['name_player']) ? $_REQUEST['name_player'] : null;


$config = new Config();
$db = new DbConnect($config->getHost(), $config->getUsername(), $config->getPassword());
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
    echo "Error:" . $ex;
}


function processRequest($repository, $action, $roomId, $session, $username)
{
    $actionObject = null;

    switch ($action) {
        case "get_room":
            $actionObject = new GetRoomAction($repository, $roomId, $session, $username);
            break;
        case "get_state":
            $actionObject = new GetStateAction($repository, $roomId, $session, $username);
            break;
        case "enter_room":
            $actionObject = new EnterRoomAction($repository, $roomId, $session, $username);
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
}
