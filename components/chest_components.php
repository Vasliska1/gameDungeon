<?php
require_once "../models/db_сonnect.php";
require_once "../models/object/GeneratingObject.php";



$chest= GeneratingObject::getRoom($_GET["id_room"]);