<?php
  session_start();
  if(isset($_SESSION["name"]))
  {
    $logged = true;
  }
  else
  {
    $logged = false;
  }
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./css/master2.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>All Employees Daily Tasks</title>
    </head>
    <body>
        <?php
            require_once 'adminPageFuncs.php';
            require_once 'dbFunc.php';
            $logo1 = "2.png";
            $title = "Home";
    
            pageHead1($logo1, $title, $logged);

        ?>
        <h3>
            <?php
                date_default_timezone_set('US/Eastern');
                echo "Today is " . date("l") . " " . date("m-d-Y") . "<br>";
            ?>
        </h3>

            <div>
                <h2>
                    Avaliable Employees:
                </h2>
                <?php
                    //get list of tasks sql 
                    $conn = connectDB();
                    $sqlGetEmployees = "SELECT `employeeID`,`employeeFirstName`, `employeeLastName` FROM `employee`";
                    $result = mysqli_query($conn, $sqlGetEmployees);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo $row["employeeID"] . " ". $row['employeeFirstName']. " ". $row['employeeLastName']."<br>";
                        }
                        echo "<br>";
                    } else {
                        echo "0 results";
                    }
                ?>  
            </div>
        <div class="form-group">
            <label for="employees">Search Employes:</label>
            <input type="text" id="empID" name="empID" onkeyup="searchEmployee(this)" placeholder="Enter ID">
        </div>
        <div id="results"></div>
    <script type="text/javascript" src="./js/searchEmployee2.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>