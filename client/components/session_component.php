<?php
define("ROOT_PATH", $_SERVER['DOCUMENT_ROOT']."/testVkontakte");

require_once "../Client.php";
$sessionCreate=false;


if(isset($_GET["name_player"])){
    session_start();

    $_SESSION["id_session"]= Client::getResponse("create_session", array("name_player" => $_GET["name_player"]));

    $sessionCreate=true;
}
