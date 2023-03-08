<?php
	include 'connect.php';

	$username = $_POST['username'];
	$level = $_POST['level'];
	$score = $_POST['score'];

	$sql = "INSERT INTO `classic` ( `username`, `level`, `score`) VALUES ('$username', '$level', '$score')";

	if (mysqli_query($conn, $sql)){
		echo json_encode(array("statusCode"=>200));
	} 
	else{
		echo json_encode(array("statusCode"=>201));
	}
    
	mysqli_close($conn);
?>