<?php
	require_once 'dbFunc.php';
	$jobID = $_POST["jobID"];
    $employeeID = $_POST["employeeID"];
	$startDate = $_POST["startDate"];
	$endDate = $_POST["endDate"];

    //$newStartDate = $startDate->format('Y-m-d H:i:s');
   // $newEndDate = $endDate->format('Y-m-d H:i:s');

	$conn = connectDB();

    //$sql = "UPDATE `jobs` SET `employeeOnTask`= \"$employeeID\", `employeeStartDate`=\"$newStartDate\",`employeeEndDate`=\"$newEndDate\" WHERE `jobID` = \"jobID\";";
    $sql = "UPDATE `jobs` SET `employeeOnTask`= \"$employeeID\" WHERE `jobID` = \"$jobID\";";


	if ($conn->query($sql) === TRUE) {
	 	header('Location: ./assignTasks.php');
	} else {
		header('Location: ./createEmployeeAccount.php?msg=Please Try Again');
	}

	$conn->close();


?>