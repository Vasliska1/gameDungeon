<?php
require_once ROOT_PATH."/server/item/SessionRepository.php";


$score = SessionRepository::getScore($_SESSION["id_session"]) ;
