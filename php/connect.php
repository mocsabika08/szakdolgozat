<?php
    $server="localhost";
    $user="root";
    $password="";
    $dbname="arkanoid";

    $conn= new mysqli($server,$user,$password,$dbname);
    $conn->set_charset("utf8");
    if ($conn->connect_error)
    {
        die("Hiba:{$conn->connect_error}");
    }
?>