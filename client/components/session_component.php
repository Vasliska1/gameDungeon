<?php
define("ROOT_PATH", $_SERVER['DOCUMENT_ROOT']."/testVkontakte");
require_once ROOT_PATH."/server/db_сonnect.php";
require_once ROOT_PATH."/server/item/SessionRepository.php";
require_once ROOT_PATH."/server/map/RoomRepository.php";
require_once "../Client.php";
$sessionCreate=false;


if(isset($_GET["name_player"])){
    session_start();

    $_SESSION["id_session"]= Client::getResponse("create_session", array("name_player" => $_GET["name_player"]));

    $sessionCreate=true;
}
