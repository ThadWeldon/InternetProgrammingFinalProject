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
    <link rel="stylesheet" href="./css/master2.css">
    <link rel="stylesheet" href="./css/editTasks.css">


    <title>Create Jobs</title>
  </head>
  <body>
  <?php
        require_once 'dbFunc.php';
        //require_once 'createTasksFuncs.php';
        require_once 'adminPageFuncs.php';

        $logo1 = "2.png";
        $title = "Create Tasks";

        pageHead1($logo1, $title, $logged);
        if(isset($_GET['msg']))
          echo "<h4 class =\"text-danger\">".$_GET['msg']."</h4>";
    ?>

    <!-- Login in prompt -->
    <center>
        <h2>
            Create Jobs
        </h2>
          <br>

    <form class="myForm" action ="./createTasksFuncs.php" method = "post">
      <div class="form-group">
      <div class="form-group">
        <label for="JobTitle">Job Title</label>
        <input type="JobTitle" class="form-control" id="jobTitle" placeholder="Job Title" name="jobTitle">
      </div>
      <div class="form-group">
        <label for="customerName">Customer Name</label>
        <input type="customerName" class="form-control" id="customerName" placeholder="customer name" name="customerName">
      </div>
      <div class="form-group">
        <label for="email">Customer Email Address</label>
        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="customer email" name="email">
      </div>
      <div class="form-group">
        <label for="address">Job Address</label>
        <input type="address" class="form-control" id="address" placeholder="customer address" name="address">
      </div>
      <div class="form-group">
        <label for="number">Customer Phone Number</label>
        <input type="number" class="form-control" id="number" placeholder="Customer Number" name="number">
      </div>
      <div class="form-group">
        <label for="comments">Job Comments</label>
        <input type="comments" class="form-control" id="comments" placeholder="Job Comments" name="comments">
      </div>
      <button type="submit" class="btn btn-dark">Create Job</button>
    </form>
</div>
    </center>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>