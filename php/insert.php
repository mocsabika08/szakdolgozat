<?php
	include 'connect.php';

	// if (isset($_POST['username']) && isset($_POST['level']) && isset($_POST['score']))
		$conn -> query("INSERT INTO `classic` (`username`, `level`, `score`) VALUES ('{$_POST['username']}', '{$_POST['level']}', '{$_POST['score']}')");
?>