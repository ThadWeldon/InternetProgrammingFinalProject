<?php
    function connectDB()
    {
        $hn="localhost";
        $un="phpUser";
        $pwd="PhpUser@1234";
        $db="vinceweldonelectric";


        $conn=new mysqli($hn, $un, $pwd, $db);
        if($conn->connect_error) die("Fatal Error");
        return $conn;
    }

    function selectQueryResults($conn, $query)
    {
        $arr=array();

        $result=$conn->query($query);
          if (!$result) die("Fatal Error on query");

          $rows=$result->num_rows;

          for ($i=0; $i < $rows; $i++)
          {
               $record=$result->fetch_array(MYSQLI_ASSOC);
            array_push($arr, $record);
          }

          $result->close();
          return $arr;
    }

?>