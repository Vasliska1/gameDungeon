<?php

require_once "../components/room_create_components.php";
require_once "../components/chest_components.php";
require_once "../components/monster_component.php";
require_once "score.php";
require_once "restart.php";
?>


<!DOCTYPE html>
<html lang="ru">
<style>
    a {
        text-decoration: none; /* Отменяем подчеркивание у ссылки */
    }

    p {
        line-height: 0.5em;
        font-size: 3rem;
        text-align: center;
    }

</style>
<body>
<?= $state->getState() ?>
<?= $room->getRoomObject() ?>
<?php

if ($room->getRoomObject() == "none" | ($state->getState() == "explored" & $room->getRoomObject() == "chest") | ($state->getState() == "explored" & $room->getRoomObject() == "monster")) {
if ($room->getUp() != 0) {
    ?>

    <p>🟥🟥<a href="generate_room.php?id_room=<?= $room->getUp() ?>">🚪</a>🟥🟥</p>
    <?php
} else {
    ?>
    <p>🟥🟥🟥🟥🟥</p>
    <?php
}
    ?>
    <p>🟥⬜️⬜️⬜️🟥</p>

    <?php
if ($room->getLeft() != 0 & $room->getRight() != 0) {
    ?>

    <p><a href="generate_room.php?id_room=<?= $room->getLeft() ?>">🚪</a>⬜⬜⬜<a
                href="generate_room.php?id_room=<?= $room->getRight() ?>">🚪</a></p>
    <?php
}
    ?>
    <?php
if ($room->getLeft() != 0 & $room->getRight() == 0) {
    ?>

    <p><a href="generate_room.php?id_room=<?= $room->getLeft() ?>">🚪</a>⬜⬜⬜🟥</p>
    <?php
}
    ?>
    <?php
if ($room->getLeft() == 0 & $room->getRight() != 0) {
    ?>

    <p>🟥⬜⬜⬜<a href="generate_room.php?id_room=<?= $room->getRight() ?>">🚪</a></p>
    <?php
}
    ?>

    <p>🟥⬜️⬜️⬜️🟥</p>


    <?php
if ($room->getDown() != 0) {
    ?>
    <p>🟥🟥<a href="generate_room.php?id_room=<?= $room->getDown() ?>">🚪</a>🟥🟥</p>
    <?php
} else {
    ?>
    <p>🟥🟥🟥🟥🟥</p>
<?php
}
} elseif ($room->getRoomObject() == "chest") {

?>
    <p>🟥🟥🟥🟥🟥</p>
    <p>🟥⬜️⬜️⬜️🟥</p>
    <p>🟥⬜️<a href="generate_room.php?points=<?= $chest->getPoints() ?>&id_room=<?= $chest->getIdRoom() ?>">🧰</a>⬜️🟥
    </p>
    <p>🟥⬜️⬜️⬜️🟥</p>
    <p>🟥🟥🟥🟥🟥</p>

    <p>You are in a room with <?= $chest->getRarity() ?> chest </p>
    <p>You get <?= $chest->getPoints() ?> points</p>
    <p>Click on the chest</p>
<?php
}
else{
?>
<?php echo $powerMonster = $monster->getPower(); ?>
    <p>🟥🟥🟥🟥🟥</p>
    <p>🟥⬜️⬜️⬜️🟥</p>
    <p>🟥⬜️<a href="generate_room.php?points=<?= $powerMonster ?>&id_room=<?= $monster->getIdRoom() ?>">👹</a>⬜️🟥
    </p>
    <p>🟥⬜️⬜️⬜️🟥</p>
    <p>🟥🟥🟥🟥🟥</p>

    <p>You are in a room with <?= $monster->getType(); ?> monster </p>

    <script>

        /* function wait() {
             let power;
             power= <?php json_encode((object)"2", JSON_HEX_TAG); ?>
            alert(power)
         }
        setTimeout(wait, 100);
*/

    </script>

    <p>Power monster is <?php echo $powerMonster = $monster->getPower(); ?>  </p>
    <p>Now we genesis of your hit....</p>
    <p> Your hit = <?php echo $playerPower = rand(2, $monster->getPower() * 2) ?></p>
    <p style="color: darkred"> Start the fight</p>

<?php

while ($powerMonster > $playerPower) {

$powerMonster = $powerMonster - $monster->getDecreaseStrength();
$playerPower = rand(2, $powerMonster);
?>
    <p> The power of your blow is less than the power of the monster</p>
    <p> The monster's strength is reduced by <?= $monster->getDecreaseStrength()?></p>
    <p> We generate the strength of your next hit</p>
    <p> Hit = <?= $playerPower ?></p>

<?php
}

?>
    <p> Your strength is greater than the strength of a monster - you have won</p>
    <p> Your get <?= $powerMonster ?> points </p>
    <p>Click on the monster</p>

    <?php

    ?>


    <?php
}
?>
</body>
</html>

