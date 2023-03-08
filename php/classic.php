<h2>Klasszikus mód</h2>

<?php
    include "connect.php";
?>

<div id="score">Pontszám: 0</div>
<div id="level">Szint: 1</div>
<div id="lives">Életek: 3</div>

<canvas id="arkanoid" width="800" height="600"></canvas>
<script src="js/classic.js"></script>