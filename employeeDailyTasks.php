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
    <link rel="stylesheet" href="./css/master2.css">
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

          date_default_timezone_set('US/Eastern');

          $timestamp = time(); // Use the current time, or replace with your own timestamp
          $currentDate = date('Y-m-d H:i:s', strtotime("today", $timestamp));
    ?>
    <div class="container">
      <center><h2>
          Daily Tasks
      </h2></center>
  <form action ="<?php echo $_SERVER['PHP_SELF'];?>" method = "post">
    <div class="form-group">
    <div class="form-group">
      <label for="date">Choose Date</label>
      <input type="date" class="form-control" id="date" placeholder="Choose Date" name="date" value = "<?php echo $currentDate; ?>">
    </div>
    <button type="submit" class="btn btn-dark">Search Date</button>
  </form>
</div>
    
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        require_once 'dbFunc.php';
        $employee = $_SESSION["name"];

        date_default_timezone_set('US/Eastern');
        //$getTodaysDate = date_create(date("Y-m-d"));
        //$currentDate = $getTodaysDate->format('Y-m-d H:i:s');

        $timestamp = time(); // Use the current time, or replace with your own timestamp
        //$currentDate = date('Y-m-d H:i:s', strtotime("today", $timestamp));
        //$end_of_day = date('Y-m-d H:i:s', strtotime("tomorrow", $timestamp) - 1);
        $currentDate = $_POST["date"];

        $conn = connectDB();

        $sqlName = "SELECT employeeID FROM employee WHERE employeeFirstName = '$employee';";
        $result = mysqli_query($conn, $sqlName);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $empID = $row["employeeID"];
            }
        }

        $sql = "SELECT jobs.jobID, jobs.jobTitle, jobs.customerPhoneNumber, jobs.location, jobs.customerName, jobs.openDate, jobs.closeDate, jobs.comments FROM employee INNER JOIN jobs ON employee.employeeID=jobs.employeeOnTask WHERE employeeID = \"$empID\" AND \"$currentDate\" BETWEEN employeeStartDate AND employeeEndDate;";
        echo $currentDate . "<br>";
        $result = mysqli_query($conn, $sql);
    }

    ?>
        <table class="table table-striped table-bordered table-dark">                     
            <div class="table responsive">
                <thead>
                    <tr>
                    <th>Job ID</th>
                    <th>Job Title</th>
                    <th>Customer Phone</th>
                    <th>Customer Name</th>
                    <th>Location</th>
                    <th>Open Date</th>
                    <th>Close Date</th>
                    <th>comments</th>
                    </tr>
                </thead>
                <tbody>
        <?php
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $count = $count + 1;
                echo '<tr>
                          <td scope="row">' . $row["jobID"]. '</td>
                          <td>' . $row["jobTitle"] .'</td>
                          <td>' . $row["customerPhoneNumber"] .'</td>
                          <td> '.$row["customerName"] .'</td>
                          <td> '.$row["location"] .'</td>
                          <td> '.$row["openDate"] .'</td>
                          <td> '.$row["closeDate"] .'</td>
                          <td> '.$row["comments"] .'</td>
                        </tr>';
            }
        }
                $conn->close();
        ?>
        </tbody>
            </div>
        </table><br>
            </div>

    <div class = " container">
            <hr>
    <center>
    <h2>
        Close Job
    </h2>
    </center>
    <form action ="./closeJobHandler.php" method = "post">
      <div class="form-group">
      <div class="form-group">
        <label for="id">Enter Job ID</label>
        <input type="jobID" class="form-control" id="jobID" placeholder="jobID" name="jobID">
      </div>
        <div class="form-group">
        <label for="date">Date Completed</label>
        <input type="date" class="form-control" id="date" placeholder="date" name="date">
      </div>
        <button type="submit" class="btn btn-dark">Completed Job</button>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>