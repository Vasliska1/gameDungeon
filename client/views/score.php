<?php
require_once "../components/get_score.php";
?>


<div class="score" style="line-height: 0.5em;
        font-size: 3rem;
        text-align: center;">
    Score: <?= $score->getCurrentScore() ?>
</div>
