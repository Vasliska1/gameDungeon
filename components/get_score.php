<?php

if (!isset($_SESSION["score"])) {
    session_start();
}

if ($_GET["restart"] == 1)
    $_SESSION["score"] = 0;
else {
    if (isset($_GET["points"])) {
        $_SESSION["score"] = ($_SESSION["score"]) + $_GET["points"];
    }
}
$score = $_SESSION["score"];
