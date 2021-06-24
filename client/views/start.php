

<style>
    .start {

        font-size: 2rem;
        text-align: center;
        font-family: 'Righteous', serif;
    }

    .button {
        text-align: center;
        background: #cd97c8; /* Серый цвет фона */
        color: #fff; /* Белый цвет текста */
        padding: 1rem 1.5rem; /* Поля вокруг текста */
        text-decoration: none; /* Убираем подчёркивание */
        border-radius: 3px; /* Скругляем уголки */
        margin-top: 100px;
        font-family: 'Righteous', serif;
        width: 300px;
        height: 100px;
        font-size: 3rem;
    }

    input {
        width: 300px;
        height: 40px;
        margin-top: 50px;
    }


</style>


$POST["name"] != null {
    //create session in SESSION
// save username to DB
// redirect -> generate_room.php?room_id=1&action=enter_room
}

<?php
require_once "../components/session_component.php";

if($sessionCreate){

    header("Location: generate_room.php?id_room=1&action=enter_room");
    exit;
}

?>

<div class="start">
    <p>👽 Welcome to Emoji Dungeon Escape Game 👾</p>
    <form action="start.php" method="get" style="max-width: 100%">


        <p>Your name 👉 <input name="name_player" required></p>
        <input type="hidden" name="id_room" value="1">
        <input type="hidden" name="action" value="enter_room">
        <div>
            <button class="button" type="submit" name="bt">
                Start game 🚀‍️
            </button>
        </div>
    </form>
</div>