<?php


if (isset($_GET['restart'])) {
    $rowScore = Client::getResponse("restart", array("id_session" => $_SESSION["id_session"]));
}