<?php
require_once "../db_сonnect.php";
require_once "../map/RoomRepository.php";
require_once "../item/ItemRepository.php";
require_once "../item/SessionRepository.php";

$action = $_REQUEST['action'];


//echo "ac:" .$action;
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