<?php

define("ROOT_PATH", $_SERVER['DOCUMENT_ROOT'] . "/testVkontakte");

require_once "../Client.php";

session_start();


$rowState = Client::getResponse("get_state", array("id_room" => $_GET["id_room"], "id_session" => $_SESSION["id_session"]));
$state = new StateRoom($rowState->idRoom, $rowState->state, $rowState->idSession, $rowState->objectPower);

$rawRoom = Client::getResponse("get_room", array("id_room" => $_GET["id_room"], "id_session" => $_SESSION["id_session"]));
$room = new Room($rawRoom->id, $rawRoom->roomObject, $rawRoom->left, $rawRoom->right, $rawRoom->up, $rawRoom->down, $rawRoom->isStart, $rawRoom->isFinish);///curl.getRoom($_GET["id_room"]);//RoomRepository::getRoom($_GET["id_room"]);

$hit = 0;

if (isset($_GET["action"])){
    $action = $_GET["action"];


if ($action == "enter_room") {
    $rowState = Client::getResponse("enter_room", array("id_room" => $_GET["id_room"], "id_session" => $_SESSION["id_session"]));

}

if ($action == "attack_monster") {

    $raw = Client::getResponse("attack_monster", array("id_room" => $_GET["id_room"], "id_session" => $_SESSION["id_session"]));
    $monster = new Monster($raw->monster->idRoom, $raw->monster->type, $raw->monster->power, $raw->monster->decreaseStrength);
    $hit= $raw->hit;


    $rowState = Client::getResponse("get_state", array("id_room" => $_GET["id_room"], "id_session" => $_SESSION["id_session"]));
    $state = new StateRoom($rowState->idRoom, $rowState->state, $rowState->idSession, $rowState->objectPower);
    if ($state->getState() == "win_monster")
        Client::getResponse("enter_room", array("id_room" => $_GET["id_room"], "id_session" => $_SESSION["id_session"]));

}


if ($action == "open_chest") {

    $rawChest = Client::getResponse("open_chest", array("id_room" => $_GET["id_room"], "id_session" => $_SESSION["id_session"]));
    $chest = new Chest($rawChest->idRoom, $rawChest->rarity, $rawChest->points);

    $rowState = Client::getResponse("get_state", array("id_room" => $_GET["id_room"], "id_session" => $_SESSION["id_session"]));
    $state = new StateRoom($rowState->idRoom, $rowState->state, $rowState->idSession, $rowState->objectPower);

    Client::getResponse("enter_room", array("id_room" => $_GET["id_room"], "id_session" => $_SESSION["id_session"]));


}}

