<?php
//case "create_db" :
//    $sql = "CREATE TABLER...." execute($sql)

$sql = "CREATE TABLE IF NOT EXISTS state_room (is_session VARCHAR (30),id_room INT(20),state_room VARCHAR(30),object_power VARCHAR(30) ),
CREATE TABLE IF NOT EXISTS map (id INT, room_object VARCHAR(30), left_room INT, right_room INT, up_room INT, down_room INT, is_start INT, is_finish INT  ),
CREATE TABLE IF NOT EXISTS chest (id_room INT(20),rarity VARCHAR(30), points INT),
CREATE TABLE IF NOT EXISTS monster (id_room INT(20),type_monster VARCHAR(30), power INT)
CREATE TABLE IF NOT EXISTS session (id_session VARCHAR (30),name_player VARCHAR (20), score INT(30)),
INSERT INTO monster (`id_room`, `type_monster`,`power`) VALUES (3, 'week', 4),(13, 'almighty', 16 )     
    
    


";

exec;