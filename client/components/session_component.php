<?php
define("ROOT_PATH", $_SERVER['DOCUMENT_ROOT']."/testVkontakte");
require_once ROOT_PATH."/server/db_сonnect.php";
require_once ROOT_PATH."/server/item/SessionRepository.php";
require_once ROOT_PATH."/server/map/RoomRepository.php";
$sessionCreate=false;


if(isset($_GET["name_player"])){
    session_start();
    $_SESSION["id_session"]=SessionRepository::addNewUserToSession($_GET["name_player"]);
    RoomRepository::addRoomStateForPlayer( $_SESSION["id_session"]);
    $sessionCreate=true;
}
