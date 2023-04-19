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
    <title>Daily Tasks</title>
    <link rel="stylesheet" href="./css/master.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
  <?php
        require_once 'employeePageFuncs.php';

        $logo1 = "2.png";
        $title = "Home";

        pageHead1($logo1, $title, $logged);
        if(isset($_GET['msg']))
          echo "<h4 class =\"text-danger\">".$_GET['msg']."</h4>";
    ?>
    <?php
        require_once 'dbFunc.php';
        $employee = $_SESSION["name"];

        date_default_timezone_set('US/Eastern');
        $monday = date( 'Y-m-d', strtotime( 'monday this week' ) );
        $tuesday = date( 'Y-m-d', strtotime( 'tuesday this week' ) );
        $wednesday = date( 'Y-m-d', strtotime( 'wednesday this week' ) );
        $thursday = date( 'Y-m-d', strtotime( 'thursday this week' ) );
        $friday = date( 'Y-m-d', strtotime( 'friday this week' ) );

        $conn = connectDB();
        $sqlName = "SELECT employeeID FROM employee WHERE employeeFirstName = '$employee';";
        $result = mysqli_query($conn, $sqlName);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $empID = $row["employeeID"];
            }
        } else {
            echo "0 results";
        }
        ?>
        <table class="table table-striped">                     
            <div class="table responsive">
                <thead>
                    <tr>
                    <th>Monday</th>
                    <th>Job Title</th>
                    <th>Customer Phone</th>
                    <th>Customer Name</th>
                    <th>Location</th>
                    </tr>
                </thead>
                <tbody>
        <?php
        //1
        $sql = "SELECT jobs.jobTitle, jobs.customerPhoneNumber, jobs.location, jobs.customerName FROM employee INNER JOIN jobs ON employee.employeeID=jobs.employeeOnTask WHERE employeeID = \"$empID\" AND \"$monday\" BETWEEN employeeStartDate AND employeeEndDate;";

        $result = mysqli_query($conn, $sql);
        $count = 0;
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $count = $count + 1;
                echo '<tr>
                          <td scope="row">' . $count. '</td>
                          <td>' . $row["jobTitle"] .'</td>
                          <td>' . $row["customerPhoneNumber"] .'</td>
                          <td> '.$row["customerName"] .'</td>
                          <td> '.$row["location"] .'</td>
                        </tr>';
            }
        } else {
            echo "0 results";
        } 
        ?>
               </tbody>
            </div>
        </table><br><br>

        <table class="table table-striped">                     
            <div class="table responsive">
                <thead>
                    <tr>
                    <th>Tuesday</th>
                    <th>Job Title</th>
                    <th>Customer Phone</th>
                    <th>Customer Name</th>
                    <th>Location</th>
                    </tr>
                </thead>
                <tbody>
        <?php
        //1
        $sql = "SELECT jobs.jobTitle, jobs.customerPhoneNumber, jobs.location, jobs.customerName FROM employee INNER JOIN jobs ON employee.employeeID=jobs.employeeOnTask WHERE employeeID = \"$empID\" AND \"$tuesday\" BETWEEN employeeStartDate AND employeeEndDate;";

        $result = mysqli_query($conn, $sql);
        $count = 0;
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $count = $count + 1;
                echo '<tr>
                          <td scope="row">' . $count. '</td>
                          <td>' . $row["jobTitle"] .'</td>
                          <td>' . $row["customerPhoneNumber"] .'</td>
                          <td> '.$row["customerName"] .'</td>
                          <td> '.$row["location"] .'</td>
                        </tr>';
            }
        } else {
            echo "0 results";
        } 
        ?>
               </tbody>
            </div>
        </table><br><br>

        <table class="table table-striped">                     
            <div class="table responsive">
                <thead>
                    <tr>
                    <th>Wednesday</th>
                    <th>Job Title</th>
                    <th>Customer Phone</th>
                    <th>Customer Name</th>
                    <th>Location</th>
                    </tr>
                </thead>
                <tbody>
        <?php
        //1
        $sql = "SELECT jobs.jobTitle, jobs.customerPhoneNumber, jobs.location, jobs.customerName FROM employee INNER JOIN jobs ON employee.employeeID=jobs.employeeOnTask WHERE employeeID = \"$empID\" AND \"$wednesday\" BETWEEN employeeStartDate AND employeeEndDate;";

        $result = mysqli_query($conn, $sql);
        $count = 0;
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $count = $count + 1;

                echo '<tr>
                          <td scope="row">' . $count. '</td>
                          <td>' . $row["jobTitle"] .'</td>
                          <td>' . $row["customerPhoneNumber"] .'</td>
                          <td> '.$row["customerName"] .'</td>
                          <td> '.$row["location"] .'</td>
                        </tr>';
            }
        } else {
            echo "0 results";
        } 
        ?>
               </tbody>
            </div>
        </table><br><br>

        <table class="table table-striped">                     
            <div class="table responsive">
                <thead>
                    <tr>
                    <th>Thursday</th>
                    <th>Job Title</th>
                    <th>Customer Phone</th>
                    <th>Customer Name</th>
                    <th>Location</th>
                    </tr>
                </thead>
                <tbody>
        <?php
        //1
        $sql = "SELECT jobs.jobTitle, jobs.customerPhoneNumber, jobs.location, jobs.customerName FROM employee INNER JOIN jobs ON employee.employeeID=jobs.employeeOnTask WHERE employeeID = \"$empID\" AND \"$thursday\" BETWEEN employeeStartDate AND employeeEndDate;";

        $result = mysqli_query($conn, $sql);
        $count = 0;
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $count = $count + 1;

                echo '<tr>
                          <td scope="row">' . $count. '</td>
                          <td>' . $row["jobTitle"] .'</td>
                          <td>' . $row["customerPhoneNumber"] .'</td>
                          <td> '.$row["customerName"] .'</td>
                          <td> '.$row["location"] .'</td>
                        </tr>';
            }
        } else {
            echo "0 results";
        } 
        ?>
               </tbody>
            </div>
        </table><br><br>

        <table class="table table-striped">                     
            <div class="table responsive">
                <thead>
                    <tr>
                    <th>Friday</th>
                    <th>Job Title</th>
                    <th>Customer Phone</th>
                    <th>Customer Name</th>
                    <th>Location</th>
                    </tr>
                </thead>
                <tbody>
        <?php
        //1
        $sql = "SELECT jobs.jobTitle, jobs.customerPhoneNumber, jobs.location, jobs.customerName FROM employee INNER JOIN jobs ON employee.employeeID=jobs.employeeOnTask WHERE employeeID = \"$empID\" AND \"$friday\" BETWEEN employeeStartDate AND employeeEndDate;";

        $result = mysqli_query($conn, $sql);
        $count = 0;
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $count = $count + 1;

                echo '<tr>
                          <td scope="row">' . $count. '</td>
                          <td>' . $row["jobTitle"] .'</td>
                          <td>' . $row["customerPhoneNumber"] .'</td>
                          <td> '.$row["customerName"] .'</td>
                          <td> '.$row["location"] .'</td>
                        </tr>';
            }
        } else {
            echo "0 results";
        } 
        ?>
               </tbody>
            </div>
        </table><br><br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>