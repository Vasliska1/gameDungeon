<?php

require_once "../components/room_create_components.php";
require_once "score.php"

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

<?php

if ($room->getRoomObject() == "none" | $state->getState() == "explored") {
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
    <p>🟥⬜️🧰⬜️🟥</p>
    <p>🟥⬜️⬜️⬜️🟥</p>
    <p>🟥🟥🟥🟥🟥</p>

    <?php
}
else{
?>
    <p>🟥🟥🟥🟥🟥</p>
    <p>🟥⬜️⬜️⬜️🟥</p>
    <p>🟥⬜️👹⬜️🟥</p>
    <p>🟥⬜️⬜️⬜️🟥</p>
    <p>🟥🟥🟥🟥🟥</p>

    <?php
}
?>
</body>
</html>

