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
    <title>Home</title>
    <link rel="stylesheet" href="./css/master.css">
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
    <h2>
        <center>
            Dashboard
        </center>
    </h2>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" onchange="getJobs(this)" value = "1">
      <label class="form-check-label" for="flexRadioDefault1">
        Active Jobs
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" onchange="getJobs(this)" value = "0" checked>
      <label class="form-check-label" for="flexRadioDefault2">
        Closed Jobs
      </label>
    </div>
    <div id="results"></div>

    <script type="text/javascript" src="./js/admin.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>