<h2>Ranglista</h2>

<?php
    include "connect.php";

    $sql = "SELECT * FROM classic";
    $result = $conn -> query($sql);
?>

<h3>Klasszikus mód</h3>

<table>
    <head>
        <th>Játékos</th>
        <th>Szint</th>
        <th>Életek</th>
        <th>Pontszám</th>
    </head>
    <?php
        while ($row = $result -> fetch_assoc())
            print ("
            <tr>
                <td>{$row['username']}</td>
                <td>{$row['level']}</td>
                <td>{$row['score']}</td>
            </tr>
            ");
    ?>
</table>

<?php
    $sql = "SELECT * FROM time";
    $result = $conn -> query($sql);
?>

<h3>Időfutam mód</h3>

<table>
    <head>
        <th>Játékos</th>
        <th>Szint</th>
        <th>Életek</th>
    </head>
    <?php
        while ($row = $result -> fetch_assoc())
            print ("
            <tr>
                <td>{$row['username']}</td>
                <td>{$row['level']}</td>
                <td>{$row['lives']}</td>
            </tr>
            ");
    ?>
</table>