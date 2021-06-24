<?php
?>
<style>
    @import url(https://fonts.googleapis.com/css?family=Righteous);

    *, *:before, *:after {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        position: relative;
    }

    html, body, h2 {
        height: 50%;
    }
    body {
        text-align: center;
        background-color: hsl(281, 42%, 58%);
    }
    body:before {
        content: '';
        display: inline-block;
        vertical-align: middle;
        font-size: 0;
        height: 50%;

    }

    h1 {
        margin-bottom: 50px;
        display: inline-block;
        color: white;
        font-family: 'Righteous', serif;
        font-size: 12em;
        text-shadow: .03em .03em 0 hsla(230,40%,50%,1);
    }
    h2{
        display: inline-block;
        color: #ffffff;
        font-family: 'Righteous', serif;
        font-size: 7em;
        text-shadow: .03em .03em 0 hsla(230,40%,50%,1);
        margin-bottom: 220px;
    }
    h1:after {
        content: attr(data-shadow);
        position: absolute;
        top: .06em; left: .06em;
        z-index: -1;
        text-shadow: none;
        background-image:
                linear-gradient(
                        45deg,
                        transparent 45%,
                        hsla(48,20%,90%,1) 45%,
                        hsla(48,20%,90%,1) 55%,
                        transparent 0
                );
        background-size: .05em .05em;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;

        animation: shad-anim 15s linear infinite;
    }

    @keyframes shad-anim {
        0% {background-position: 0 0}
        0% {background-position: 50% -50%}
    }

.btn{
    width: 300px;
    height: 100px;
    font-size: 3rem;
    color: darkred;
}

  </style>
<!DOCTYPE html>
<html>

<body>
<h1 data-shadow='Congratulations!'>Congratulations!</h1>
<h2 >You left the dungeon!</h2>
<br>
</body>

<?php
require "restart.php";
?>

<script>

    </script>
</html>