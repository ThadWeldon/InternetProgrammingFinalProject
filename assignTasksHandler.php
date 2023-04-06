<?php
	require_once 'dbFunc.php';
	$jobID = $_POST["jobID"];
    $employeeID = $_POST["employeeID"];
	$startDate = $_POST["startDate"];
	$endDate = $_POST["endDate"];
    
	$newerStartDate = date('Y-m-d', strtotime($startDate));
	$newerEndDate = date('Y-m-d', strtotime($endDate));


	$conn = connectDB();

    $sql = "UPDATE `jobs` SET `employeeOnTask`= \"$employeeID\", `employeeStartDate`=\"$newerStartDate\",`employeeEndDate`=\"$newerEndDate\" WHERE `jobID` = \"$jobID\";";
    //$sql = "UPDATE `jobs` SET `employeeOnTask`= \"$employeeID\" WHERE `jobID` = \"$jobID\";";

	
	if ($conn->query($sql) === TRUE) {
	 	header('Location: ./assignTasks.php');
	} else {
		header('Location: ./createEmployeeAccount.php?msg=Please Try Again');
	}

	$conn->close();


?>