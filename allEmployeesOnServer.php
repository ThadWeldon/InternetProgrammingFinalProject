<?php
        session_start();
        require_once 'dbFunc.php';
        $conn = connectDB();
        $empID=$_GET['empID'];

        date_default_timezone_set('US/Eastern');

        $timestamp = time(); // Use the current time, or replace with your own timestamp
        $currentDate = date('Y-m-d H:i:s', strtotime("today", $timestamp));
        $end_of_day = date('Y-m-d H:i:s', strtotime("tomorrow", $timestamp) - 1);

        //$sql = "SELECT jobs.jobTitle, jobs.customerPhoneNumber, jobs.location, jobs.customerName FROM employee INNER JOIN jobs ON employee.employeeID=jobs.employeeOnTask WHERE employeeID = \"$empID\" AND \"$currentDate\" BETWEEN employeeStartDate AND employeeEndDate;";
        $sql = "SELECT * FROM employee INNER JOIN jobs ON employee.employeeID=jobs.employeeOnTask WHERE employeeID = \"$empID\" AND \"$currentDate\" BETWEEN employeeStartDate AND employeeEndDate;";

        $arr = selectQueryResults($conn, $sql);
        echo json_encode($arr);
    ?>