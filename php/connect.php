<?php

    $server = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "arkanoid";

    $conn = new mysqli($server, $user, $pass, $dbname);
    if ($conn->connect_error)
    {
        die("Error: " . $conn->connect_error);
    }

?>