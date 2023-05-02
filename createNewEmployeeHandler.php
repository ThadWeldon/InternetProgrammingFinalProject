<?php
	require_once 'dbFunc.php';
	$firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
	$email = $_POST["email"];
	$pwd = $_POST["pwd"];
	$number = $_POST["number"];

	$conn = connectDB();

	$sql = "INSERT INTO `employee`(`employeeID`, `employeeFirstName`, `employeeLastName`, `employeeEmail`, `employeePhoneNumber`, `employeePassword`) VALUES (NULL,\"$firstName\",\"$lastName\", \"$email\",\"$number\",SHA1(\"$pwd\"));";

	if ($conn->query($sql) === TRUE) {
	 	header('Location: ./adminHome.php');
	} else {
		header('Location: ./createEmployeeAccount.php?msg=Please Try Again');
	}

	$conn->close();


?>