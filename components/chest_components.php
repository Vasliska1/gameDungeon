<?php

require_once "../models/object/GeneratingObject.php";

$chest= GeneratingObject::getChest($_GET["id_room"]);
