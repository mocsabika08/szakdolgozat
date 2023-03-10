<?php

    $server = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "arkanoid";

    $conn = new mysqli($server, $user, $pass);
    if ($conn->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "CREATE DATABASE IF NOT EXISTS `arkanoid` DEFAULT CHARACTER SET utf8 COLLATE utf8_hungarian_ci;";
    if ($conn -> query($sql) === FALSE)
    {
        echo "Error creating database: " . $conn->error;
    }

    $conn = new mysqli($server,$user,$pass,$dbname);
    $conn->set_charset("utf8");
    if ($conn->connect_error)
    {
        die("Hiba:{$conn->connect_error}");
    }

    $sql = "SELECT `username` FROM `player`";
    $result = mysqli_query($conn, $sql);
    if(empty($result))
    {
        $sql = "CREATE TABLE `player` (
                `username` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
                `password` varchar(30) COLLATE utf8_hungarian_ci NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci";
        $result = mysqli_query($conn, $sql);
    }

    $sql = "SELECT `username` FROM `classic`";
    $result = mysqli_query($conn, $sql);
    if(empty($result))
    {
        $sql = "CREATE TABLE `classic` (
                `username` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
                `level` tinyint(2) NOT NULL,
                `score` int(255) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci";
        $result = mysqli_query($conn, $sql);
    }

    $sql = "SELECT `username` FROM `time`";
    $result = mysqli_query($conn, $sql);
    if(empty($result))
    {
        $sql = "CREATE TABLE `time` (
                `username` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
                `level` tinyint(2) NOT NULL,
                `lives` tinyint(1) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci";
        $result = mysqli_query($conn, $sql);
    }

?>