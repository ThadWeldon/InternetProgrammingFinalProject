<?php
	require_once 'dbFunc.php';
                $jobID = $_POST['jobID']; 
                $jobTitle = $_POST['jobTitle']; 
                $customerName = $_POST['customerName'];
                $customerEmail = $_POST['customerEmail'];
                $employeeOnTask = $_POST['employeeOnTask'];
                $customerPhoneNumber = $_POST['customerPhoneNumber'];
                $location = $_POST['location'];
                $openDate = $_POST['openDate'];
                $closeDate = $_POST['closeDate'];
                $comments = $_POST['comments'];
                $employeeStartDate = $_POST['employeeStartDate']; 
                $employeeEndDate = $_POST['employeeEndDate']; 

	$conn = connectDB();

    $sql = "UPDATE `jobs` SET `employeeOnTask`= \"$employeeOnTask\", `employeeStartDate`=\"$employeeStartDate\",`employeeEndDate`=\"$employeeEndDate\", `jobTitle` = \"$jobTitle\", 
    `customerName` = \"$customerName\", `customerEmail` = \"$customerEmail\", `employeeOnTask` = \"$employeeOnTask\", `customerPhoneNumber` = \"$customerPhoneNumber\", `location` = \"$location\", `openDate` = \"$openDate\", `closeDate` = \"$closeDate\", `comments` = \"$comments\", `employeeStartDate` = \"$employeeStartDate\", `employeeEndDate` = \"$employeeEndDate\" WHERE `jobID` = \"$jobID\";";

	
	if ($conn->query($sql) === TRUE) {
	 	header('Location: ./editTasks.php');
	} else {
		header('Location: ./adminHome.php?msg=Please Try Again');
	}

	$conn->close();


?>