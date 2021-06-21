<?php

require_once "../models/db_сonnect.php";
require_once "../models/map/GeneratingRoom.php";



$state= GeneratingRoom::getState($_GET["id_room"]);
$room= GeneratingRoom::getRoom($_GET["id_room"]);
GeneratingRoom::setState($_GET["id_room"]);
/*RoomState
    status: Entered
    room: Room (
        color:
        isUp:
        isDownm
        roomObject
)

    Player {
        score: 213
        name: "John"
}*/