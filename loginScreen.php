<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/createEmployeeCSS.css">

    <title>Log In</title>
  </head>
  <body>
    <?php
        require_once 'loginPageFuncs.php';

        $logo1 = "2.png";
        $title = "employee login";

        pageHead1($logo1, $title);

    ?>
    <div class="container">
    <!-- Login in prompt -->

    <form action ="./loginHandler.php" method = "post">
      <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" placeholder="Password" name="pwd">
      </div>
      <button type="submit" class="btn btn-dark">Submit</button>
    </form>
    <div class="link">
    <a href="createEmployeeAccount.php">Create New Employee Account</a>
</div>

<style>
a:hover {
  color: black;
}
</style>

  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>