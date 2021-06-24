<?php

require_once "../components/game_state_component.php";
require_once "restart.php";
require_once "score.php";

?>
<!DOCTYPE html>
<html lang="ru">
<style>
    a {
        text-decoration: none;
    }

    p {
        line-height: 0.5em;
        font-size: 2rem;
        text-align: center;
        font-family: 'Helvetica', serif;
    }

    b {
        color: #ae06a5;
    }

</style>
<body>

<?php

if (($room->getRoomObject() != "none" & $state->getState() == "unexplored") | $room->getIsFinish() == 1 | $state->getState() == "attack_monster") {

    ?>
    <p>🟥🟥🟥🟥🟥</p>
    <p>🟥⬜️⬜️⬜️🟥</p>

    <?php
    if ($room->getIsFinish() == 1) {
        ?>
        <p>🟥⬜️<a href="finish.php">💫</a>⬜️🟥</p>
        <?php
    } elseif ($room->getRoomObject() == "chest") {
        ?>
        <p>🟥⬜️<a href="generate_room.php?id_room=<?= $room->getId() ?>&action=open_chest">🧰</a>⬜️🟥</p>
        <?php
    } elseif ($room->getRoomObject() == "monster") {
        ?>
        <p>
            🟥⬜️<a href="generate_room.php?id_room=<?= $room->getId() ?>&action=attack_monster">👹</a>⬜️🟥
        </p>
        <?php
    } ?>

    <p>🟥⬜️⬜️⬜️🟥</p>
    <p>🟥🟥🟥🟥🟥</p>
    <?php if ($room->getRoomObject() == "chest") {
        ?>
        <p>Click on the chest to get points </p>
    <?php }
    if ($room->getRoomObject() == "monster" & $state->getState() == "unexplored") {
        ?>

        <p>Click on the monster to start the fight</p>
        <?php
    }
} else {
    ?>
    <p>🟥🟥<?php if ($room->getUp() != 0) {
            ?><a href="generate_room.php?id_room=<?= $room->getUp() ?>&action=enter_room">🚪</a>
        <?php } else {
            echo "🟥";
        } ?>🟥🟥</p>
    <p>🟥⬜️⬜️⬜️🟥</p>

    <p><?php
        if ($room->getLeft() != 0)
            echo "<a href='generate_room.php?action=enter_room&id_room=" . $room->getLeft() . "'>🚪</a>";
        else
            echo "🟥";
        echo "⬜️";
        if ($room->getRoomObject() != "none" & $state->getState() != "unexplored")
            echo " &nbsp&nbsp&nbsp&nbsp&nbsp";
        else
            echo "⬜";
        echo "⬜";
        if ($room->getRight() != 0)
            echo "<a href='generate_room.php?action=enter_room&id_room=" . $room->getRight() . "'>🚪</a>";
        else
            echo "🟥";
        ?>
    </p>
    <p>🟥⬜️⬜️⬜️🟥</p>

    <p>🟥🟥<?php if ($room->getDown() != 0) { ?><a
            href="generate_room.php?id_room=<?= $room->getDown() ?>&action=enter_room">
                🚪</a><?php } else {
            echo "🟥";
        } ?>🟥🟥</p>

    <?php
}

if ($state->getState() == "took_chest") {
    ?>
    <p>It's <b><?= $chest->getRarity() ?></b> chest. You get <b><?= $chest->getPoints() ?></b> points</p>
    <?php

}
if ($state->getState() == "attack_monster") {
    ?>
    <p>Power monster is <?= $state->getObjectPower()+ $monster->getDecreaseStrength() ?>  </p>
    <p>Now we genesis of your hit....</p>
    <p> Your hit = <?=$hit?> </p>
    <p> The power of your blow is less than the power of the monster</p>
    <p> The monster's strength is reduced by <?= $monster->getDecreaseStrength() ?></p>
    <p> Click on the monster again to attack</p>

    <?php
}

if ($state->getState() == "win_monster" ) {
    ?>
    <p> Power monster is <?= $state->getObjectPower()  ?>  </p>
    <p> Your hit = <?=$hit?> </p>
    <p> It was <b><?= $monster->getType() ?></b> monster</p>
    <p> Your strength is greater than the strength of a monster - you have won</p>
    <p> Your get <b><?= $state->getObjectPower() ?></b> points </p>

<?php } ?>

</body>
</html>

