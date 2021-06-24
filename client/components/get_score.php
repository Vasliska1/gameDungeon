<?php

$rowScore = Client::getResponse("get_score", array("id_session" => $_SESSION["id_session"]));
$score = new Score($rowScore->idSession, $rowScore->currentScore);



