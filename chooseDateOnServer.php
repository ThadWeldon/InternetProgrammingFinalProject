<?php
        session_start();
        require_once 'dbFunc.php';
        $conn = connectDB();
        $date = $_GET["date"];
        $empID=$_SESSION['employeeID'];

        $newerDate = date('Y-m-d', strtotime($date));

        $sql = "SELECT * FROM employee INNER JOIN jobs ON employee.employeeID=jobs.employeeOnTask WHERE employeeID = \"$empID\" AND \"$newerDate\" BETWEEN employeeStartDate AND employeeEndDate;";

        $arr = selectQueryResults($conn, $sql);
        echo json_encode($arr);
    ?>