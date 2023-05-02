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
    <link rel="stylesheet" href="./css/assignTasks.css">
    <title>Assign Tasks</title>
    <link rel="stylesheet" href="./css/master2.css">
    <link rel="stylesheet" href="./css/more.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
  <?php
        require_once 'adminPageFuncs.php';
        require_once 'dbFunc.php';
        $logo1 = "2.png";
        $title = "Home";

        pageHead1($logo1, $title, $logged);

    ?>
    <div class="columns1">
        <div class="row">
            <div class="col-sm">
                <h3>
                    Avaliable Jobs to Assign:
                </h3>
                <table class="table table-striped table-bordered table-dark">                     
            <div class="table responsive">
                <thead>
                    <tr>
                    <th>Job ID #</th>
                    <th>Job Title</th>
                    <th>Customer Name</th>
                    <th>Location</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $conn = connectDB();
                    $sqlGetTasks = "SELECT `jobID`,`jobTitle`, `customerName`, `location` FROM `jobs` WHERE `employeeOnTask` IS NULL AND `closeDate` IS NULL;";
                    $result = mysqli_query($conn, $sqlGetTasks);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            $count = $count + 1;
            
                            echo '<tr>
                                      <td>' . $row["jobID"] .'</td>
                                      <td>' . $row["jobTitle"] .'</td>
                                      <td>' . $row["customerName"] .'</td>
                                      <td>' . $row["location"] .'</td>
                                    </tr>';
                        }
                    } else {
                               echo "0 results";
                    } 
                ?>
                    </tbody>
                    </div>
                </table><br>
            </div>
            <div class="col-sm">
                <h3>
                    Avaliable Employees:
                </h3>

                <table class="table table-striped table-bordered table-dark">                     
            <div class="table responsive">
                <thead>
                    <tr>
                    <th>ID #</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $conn = connectDB();
                    $sqlGetEmployees = "SELECT `employeeID`,`employeeFirstName`, `employeeLastName` FROM `employee`";
                    $result = mysqli_query($conn, $sqlGetEmployees);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            $count = $count + 1;
            
                            echo '<tr>
                                      <td>' . $row["employeeID"] .'</td>
                                      <td>' . $row["employeeFirstName"] .'</td>
                                      <td>' . $row["employeeLastName"] .'</td>
                                    </tr>';
                        }
                    } else {
                        echo "0 results";
                    } 
                ?>
                    </tbody>
                    </div>
                </table><br>
            </div>
            <div class="col-sm">
                <h3>
                    Assign Jobs:
                </h3>
                <form class = "myForm" action ="./assignTasksHandler.php" method = "post">
                    <div class="form-group">
                    <div class="form-group">
                        <label for="jobID">Job to Assign: </label>
                        <input type="jobID" class="form-control" id="jobID" placeholder="Job ID" name="jobID">
                    </div>
                    <div class="form-group">
                        <label for="employeeID">Employee to Assign to Job: </label>
                        <input type="employeeID" class="form-control" id="employeeID" placeholder="Employee ID" name="employeeID">
                    </div>
                        <label for="date">Start Date</label>
                        <input type="date" class="form-control" id="startDate" aria-describedby="startDate" placeholder="Date Assigned" name="startDate">
                    </div>
                    <div>
                        <label for="date">End Date</label>
                        <input type="date" class="form-control" id="endDate" aria-describedby="endDate" placeholder="End Date" name="endDate">
                    </div>
                    <button type="submit" class="btn btn-dark">Assign Job</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>