<?php
	require_once 'dbFunc.php';
	$jobTitle = $_POST["jobTitle"];
    $customerName = $_POST["customerName"];
	$email = $_POST["email"];
	$address = $_POST["address"];
	$number = $_POST["number"];
    $comments = $_POST["comments"];

	$conn = connectDB();

    date_default_timezone_set('US/Eastern');
    $getTodaysDate = date_create(date("Y-m-d"));
    $currentDate = $getTodaysDate->format('Y-m-d H:i:s');

	$sql = "INSERT INTO `jobs`(`jobID`, `employeeOnTask`, `jobTitle`, `customerName`, `customerEmail`, `customerPhoneNumber`, `location`, `comments`, `openDate`, `closeDate`) VALUES (NULL, NULL, \"$jobTitle\",\"$customerName\", \"$email\",\"$number\",\"$address\", \"$address\", \"$currentDate\", Null);";

	if ($conn->query($sql) === TRUE) {
	 	header('Location: ./adminHome.php');
	} else {
		header('Location: ./createTasks.php?msg=Please Try Again');
	}

	$conn->close();


?>