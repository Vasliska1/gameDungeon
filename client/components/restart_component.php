<?php
require_once ROOT_PATH."/server/map/RoomRepository.php";
require_once ROOT_PATH."/server/item/SessionRepository.php";

if (isset($_GET['restart'])) {
    $rowScore = Client::getResponse("restart", array("id_session" => $_SESSION["id_session"]));
}