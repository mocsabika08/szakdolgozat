<?php

	include "connect.php";

	if (isset($_COOKIE['username']) && isset($_COOKIE['mode']) && isset($_COOKIE['level']) && isset($_COOKIE['score']))
	{
		$username = $_COOKIE['username'];
		$mode = $_COOKIE['mode'];
		$level = $_COOKIE['level'];
		$score = $_COOKIE['score'];

		$sql = "SELECT * FROM `$mode` WHERE `username` = '$username'";
		$result = mysqli_query($conn, $sql);
		$num_rows = mysqli_num_rows($result);

		if ($num_rows > 0)
		{
		 $conn -> query("UPDATE $mode
		 				SET `username` = '$username', `level` = '$level', `score` = '$score'
		 				WHERE `username` = '$username'
						AND `score` < $score");
		}
		else
		{
			$conn -> query("INSERT INTO `$mode` (`username`, `level`, `score`)
							VALUES ('$username', '$level', '$score')");
		}
	}
	
?>