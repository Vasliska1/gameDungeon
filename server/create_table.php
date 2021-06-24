<?php


$sql = <<<EOS
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `game_vk_empty` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `game_vk_empty`;

CREATE TABLE `chest` (
  `id_room` int(20) DEFAULT NULL,
  `rarity` varchar(30) DEFAULT NULL,
  `points` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `chest` (`id_room`, `rarity`, `points`) VALUES
(2, 'ordinary', 3),
(4, 'vary rare', 15),
(7, 'rare', 8),
(11, 'rare', 8),
(14, 'ordinary', 3);

CREATE TABLE `map` (
  `id` int(11) DEFAULT NULL,
  `room_object` varchar(30) NOT NULL,
  `left_room` int(11) NOT NULL,
  `right_room` int(11) NOT NULL,
  `up_room` int(11) NOT NULL,
  `down_room` int(11) NOT NULL,
  `is_start` int(11) NOT NULL,
  `is_finish` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `map` (`id`, `room_object`, `left_room`, `right_room`, `up_room`, `down_room`, `is_start`, `is_finish`) VALUES
(1, 'none', 0, 2, 0, 5, 1, 0),
(2, 'chest', 1, 3, 0, 0, 0, 0),
(3, 'monster', 2, 4, 0, 6, 0, 0),
(4, 'chest', 3, 0, 0, 0, 0, 0),
(5, 'monster', 0, 0, 1, 7, 0, 0),
(6, 'none', 0, 0, 3, 9, 0, 0),
(7, 'chest', 0, 8, 5, 0, 0, 0),
(8, 'monster', 7, 9, 0, 11, 0, 0),
(9, 'monster', 8, 12, 6, 10, 0, 0),
(10, 'none', 11, 0, 9, 14, 0, 0),
(11, 'chest', 0, 10, 8, 0, 0, 0),
(12, 'none', 9, 13, 0, 0, 0, 0),
(13, 'monster', 12, 0, 0, 0, 0, 0),
(14, 'chest', 0, 15, 10, 0, 0, 0),
(15, 'none', 14, 0, 0, 0, 0, 1);

CREATE TABLE `monster` (
  `id_room` int(20) DEFAULT NULL,
  `type_monster` varchar(30) DEFAULT NULL,
  `power` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `monster` (`id_room`, `type_monster`, `power`) VALUES
(3, 'weak', 4),
(5, 'strong', 9),
(8, 'weak', 4),
(9, 'strong', 9),
(13, 'almighty', 16);

CREATE TABLE `session` (
  `id_session` int(11) NOT NULL,
  `name_player` varchar(255) DEFAULT NULL,
  `score` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `state_room` (
  `is_session` varchar(30) DEFAULT NULL,
  `id_room` int(20) DEFAULT NULL,
  `state_room` varchar(30) DEFAULT NULL,
  `object_power` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


ALTER TABLE `session`
  ADD PRIMARY KEY (`id_session`);


ALTER TABLE `session`
  MODIFY `id_session` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

EOS;

require_once "Config.php";

try {
    $config = new Config();
    $mysql = new mysqli($config->getHost(), $config->getUsername(), $config->getPassword());
    if ($mysql->multi_query($sql))
        echo "DB successfully create!";
} catch (Exception $e) {
    echo "Error to  create db: " . $e;
}


