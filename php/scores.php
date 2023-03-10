<h2>Ranglista</h2>

<h3>Klasszikus mód</h3>

<table>
    <head>
        <th>Játékos</th>
        <th>Szint</th>
        <th>Pontszám</th>
    </head>
    <?php
        include "insert.php";

        $sql = "SELECT * FROM `classic`";
        $result = $conn -> query($sql);
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

<h3>Időfutam mód</h3>

<table>
    <head>
        <th>Játékos</th>
        <th>Szint</th>
        <th>Életek</th>
    </head>
    <?php
        $sql = "SELECT * FROM `time`";
        $result = $conn -> query($sql);
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