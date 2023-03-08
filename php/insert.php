<?php
    $table = $_POST['table'];
    $level = $_POST['level'];
    $score = $_POST['score'];
    $sql = "INSERT INTO `$table` (`username`, `level`, `score`) VALUES ('admin', '$level', '$score')";
    if ($conn -> query($sql))
    {
        echo "data inserted";
    }
    else 
    {
        echo "failed";
    }
?>