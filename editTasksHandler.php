<!--
    1) get id from edittasks selector
    2) sql query to get all information
    3) store information in an array
    4) create a form with all information from the array
    5) create a submit button that will update the information from the form
 -->

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
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/createEmployeeCSS.css">
    <link rel="stylesheet" href="./css/master.css">

    <title>Edit Jobs</title>
  </head>
  <body>
  <?php
        require_once 'dbFunc.php';
        require_once 'adminPageFuncs.php';

        $logo1 = "2.png";
        $title = "Create Tasks";

        pageHead1($logo1, $title, $logged);
        if(isset($_GET['msg']))
          echo "<h4 class =\"text-danger\">".$_GET['msg']."</h4>";
    ?>

    <?php
        $id = $_POST['id'];
        $conn = connectDB();

        $sql = "SELECT * FROM `jobs` WHERE `jobID` = $id;";
        $result = mysqli_query($conn, $sql);
        $data = array(); // create a variable to hold the information
        $i = 0;
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $jobID = $row['jobID'];
                $jobTitle = $row['jobTitle'];
                $customerName = $row['customerName'];
                $customerEmail = $row['customerEmail'];
                $employeeOnTask = $row['employeeOnTask'];
                $customerPhoneNumber = $row['customerPhoneNumber'];
                $location = $row['location'];
                $openDate = $row['openDate'];
                $closeDate = $row['closeDate'];
                $comments = $row['comments'];
                $employeeStartDate = $row['employeeStartDate'];
                $employeeEndDate = $row['employeeEndDate'];
            }
            //echo "<br>";
        } else {
            echo "0 results";
        }

    ?>
    <div class="container">

    <!-- Login in prompt -->

    <form action ="./editTasksHandlerPhp.php" method = "post">
      <div class="form-group">
      <div class="form-group">
        <label for="JobID">Job ID</label>
        <input type="JobID" class="form-control" id="jobID" placeholder="Job ID" name="jobID" value = "<?php echo $jobID ? $jobID : ''; ?>">
      </div>
      <div class="form-group">
        <label for="JobTitle">Job Title</label>
        <input type="JobTitle" class="form-control" id="jobTitle" placeholder="Job Title" name="jobTitle" value = "<?php echo $jobTitle ? $jobTitle : ''; ?>">
      </div>
      <div class="form-group">
        <label for="customerName">Customer Name</label>
        <input type="customerName" class="form-control" id="customerName" placeholder="customer name" name="customerName" value = "<?php echo $customerName ? $customerName : ''; ?>">
      </div>
      <div class="form-group">
        <label for="email">Customer Email Address</label>
        <input type="email" class="form-control" id="customerEmail" aria-describedby="emailHelp" placeholder="customer email" name="customerEmail" value = "<?php echo $customerEmail ? $customerEmail : ''; ?>">
      </div>
      <div class="form-group">
        <label for="address">Job Address</label>
        <input type="address" class="form-control" id="location" placeholder="customer address" name="location" value = "<?php echo $location ? $location : ''; ?>">
      </div>
      <div class="form-group">
        <label for="number">Customer Phone Number</label>
        <input type="number" class="form-control" id="customerPhoneNumber" placeholder="Customer Number" name="customerPhoneNumber" value = "<?php echo $customerPhoneNumber ? $customerPhoneNumber : ''; ?>">
      </div>
      <div class="form-group">
        <label for="comments">Job Comments</label>
        <input type="comments" class="form-control" id="comments" placeholder="Job Comments" name="comments" value = "<?php echo $comments ? $comments : ''; ?>">
      </div>
      <div class="form-group">
        <label for="name">Employee On Job</label>
        <input type="name" class="form-control" id="employeeOnTask" placeholder="Employee On Job" name="employeeOnTask" value = "<?php echo $employeeOnTask ? $employeeOnTask : ''; ?>">
      </div>
      <div class="form-group">
        <label for="date">Open Date</label>
        <input type="date" class="form-control" id="openDate" placeholder="Open Date" name="openDate" value = "<?php echo $openDate ? $openDate : ''; ?>">
      </div>
      <div class="form-group">
        <label for="date">Closed Date</label>
        <input type="date" class="form-control" id="closedDate" placeholder="Closed Date" name="closeDate" value = "<?php echo $closeDate ? $closeDate : ''; ?>">
      </div>
      <div class="form-group">
        <label for="date">Employee Start Date</label>
        <input type="date" class="form-control" id="startDate" placeholder="Employee Start Date" name="employeeStartDate" value = "<?php echo $employeeStartDate ? $employeeStartDate : ''; ?>">
      </div>
      <div class="form-group">
        <label for="date">Employee End Date</label>
        <input type="date" class="form-control" id="endDate" placeholder="Employee End Date" name="employeeEndDate" value = "<?php echo $employeeEndDate ? $employeeEndDate : ''; ?>">
      </div>
      <button type="submit" class="btn btn-dark">Update Job</button>
    </form>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>