<?php
require_once "../models/map/GeneratingRoom.php";

if(isset($_GET['restart']))
    GeneratingRoom::updateState();
