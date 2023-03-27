<?php
	session_start();
	require_once 'dbFunc.php';
	$email = $_POST["email"];
	$pwd = $_POST["pwd"];
	$conn = connectDB();

	$sql = "SELECT * FROM `employee` WHERE `employeeEmail` = \"$email\" AND `employeePassword` = SHA1(\"$pwd\");"; //employee
	$sql2 = "SELECT * FROM `admin` WHERE `adminEmail` = \"$email\" AND `adminPassword` = SHA1(\"$pwd\");"; //admin


	$arr=selectQueryResults($conn, $sql);
	$arr2=selectQueryResults($conn, $sql2);

	if(count($arr)==1) //employee
	{
		$_SESSION['fistName']=$arr[0]["employeeName"];
		$_SESSION['id']=$arr[0]["employeeID"];
		$_SESSION['email']=$arr[0]["employeeEmail"];
		header('Location: ./employeeHome.php');
	}
	else if(count($arr2)==1) //admin
	{
		$_SESSION['name']=$arr[0]["adminName"];
		$_SESSION['id']=$arr[0]["adminID"];
		$_SESSION['email']=$arr[0]["adminEmail"];
		header('Location: ./adminHome.php');
	}
	else
	{
		header('Location: ./loginScreen.php?msg=Password or Email is not correct');
	}

	$conn->close();
?>