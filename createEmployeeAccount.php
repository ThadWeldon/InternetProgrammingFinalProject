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

    <title>Create Account</title>
  </head>
  <body>
  <?php
        require_once 'adminPageFuncs.php';

        $logo1 = "2.png";
        $title = "Home";

        pageHead1($logo1, $title, $logged);
        if(isset($_GET['msg']))
          echo "<h4 class =\"text-danger\">".$_GET['msg']."</h4>";
    ?>
    <div class="container">

    <!-- Login in prompt -->

    <form action ="./createNewEmployeeHandler.php" method = "post">
      <div class="form-group">
      <div class="form-group">
        <label for="name">First Name</label>
        <input type="name" class="form-control" id="firstName" placeholder="firstName" name="firstName">
      </div>
      <div class="form-group">
        <label for="name">Last Name</label>
        <input type="name" class="form-control" id="lastName" placeholder="lastName" name="lastName">
      </div>
        <label for="email">Email address</label>
        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" placeholder="Password" name="pwd">
      </div>
      <div class="form-group">
        <label for="number">Phone Number</label>
        <input type="number" class="form-control" id="number" placeholder="Number" name="number">
      </div>
      <button type="submit" class="btn btn-dark">Create Account</button>
    </form>

  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>