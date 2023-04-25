<?php
        session_start();
        require_once 'dbFunc.php';
        $conn = connectDB();
        $flexRadioDefault=$_GET['flexRadioDefault'];

        if($flexRadioDefault == 1)
        {
            $sql = "SELECT * FROM `jobs` WHERE closeDate IS NULL ORDER BY jobID;";
        }
        else
        {
            $sql = "SELECT * FROM `jobs` WHERE closeDate IS NOT NULL ORDER BY jobID;";
        }

        $arr = selectQueryResults($conn, $sql);
        echo json_encode($arr);
?>