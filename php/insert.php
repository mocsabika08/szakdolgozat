<?php

	include "connect.php";

	if (isset($_COOKIE['mode']))
	{
		if ($_COOKIE['mode']=='classic' && isset($_COOKIE['username']) && isset($_COOKIE['level']) && isset($_COOKIE['score']))
		{
			$username = $_COOKIE['username'];
			$level = $_COOKIE['level'];
			$score = $_COOKIE['score'];
	
			$sql = "SELECT * FROM `classic` WHERE `username` = '$username'";
			$result = mysqli_query($conn, $sql);
			$num_rows = mysqli_num_rows($result);
	
			if ($num_rows > 0)
			{
			 $conn -> query("UPDATE `classic`
							 SET `username` = '$username', `level` = '$level', `score` = '$score'
							 WHERE `username` = '$username'
							AND `score` < $score");
			}
			else
			{
				$conn -> query("INSERT INTO `classic` (`username`, `level`, `score`)
								VALUES ('$username', '$level', '$score')");
			}
		}
	
		if ($_COOKIE['mode']=='time' && isset($_COOKIE['username']) && isset($_COOKIE['level']) && isset($_COOKIE['lives']))
		{
			$username = $_COOKIE['username'];
			$level = $_COOKIE['level'];
			$lives = $_COOKIE['lives'];
	
			$sql = "SELECT * FROM `time` WHERE `username` = '$username'";
			$result = mysqli_query($conn, $sql);
			$num_rows = mysqli_num_rows($result);
	
			if ($num_rows > 0)
			{
			 $conn -> query("UPDATE `time`
							 SET `username` = '$username', `level` = '$level', `lives` = '$lives'
							 WHERE (`username` = '$username' AND `level` < $level)
							OR (`username` = '$username' AND `level` = $level AND `lives` < $lives)");
			}
			else
			{
				$conn -> query("INSERT INTO `time` (`username`, `level`, `lives`)
								VALUES ('$username', '$level', '$lives')");
			}
		}
	
	}
	
?>