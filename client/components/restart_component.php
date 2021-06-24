<?php
require_once ROOT_PATH."/server/map/RoomRepository.php";
require_once ROOT_PATH."/server/item/SessionRepository.php";

if (isset($_GET['restart'])) {
    RoomRepository::updateState( $_SESSION["id_session"]);
    SessionRepository::clearScore($_SESSION["id_session"]);
}