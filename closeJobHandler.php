<?php
	require_once 'dbFunc.php';
	$jobID = $_POST["jobID"];
    $date = $_POST["date"];

	$conn = connectDB();

    $sql = "UPDATE `jobs` SET `closeDate`= \"$date\" WHERE jobID = \"$jobID\";";

	
	if ($conn->query($sql) === TRUE) {
	 	header('Location: ./employeeDailyTasks.php');
	} else {
		header('Location: ./employeeDailyTasks.php?msg=Please Try Again');
	}

	$conn->close();


?>