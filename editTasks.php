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
        <link rel="stylesheet" href="./css/master.css">
        <link rel="stylesheet" href="./css/editTasks.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>Edit Tasks</title>
    </head>
    <body>
        <?php
            require_once 'adminPageFuncs.php';
            require_once 'dbfunc.php';
            $logo1 = "2.png";
            $title = "Home";
            pageHead1($logo1, $title, $logged);
            if(isset($_GET['msg']))
                echo "<h4 class =\"text-danger\">".$_GET['msg']."</h4>";
        ?>
        <?php
            $conn = connectDB();
            $sql = "select * from jobs order by jobID";
            $result = mysqli_query($conn, $sql);

            echo '<pre>';

            if ($result->num_rows > 0) {
                $ticket_names_jd = array();
                while ($row = $result->fetch_assoc()) {
                    $ticket_names_jd[] = $row['jobID'] . '^' . $row['customerName'] . '^' . $row['location'] . '^' . $row['openDate'] . '^' . $row['closeDate'];
                }
                //print_r($ticket_names_jd ); 
            }

            echo '</pre>';

        ?>
        <div class="container">
            <div class="row align-items-start">
                <div class="col">
                </div>
                <div class="col">
        <p>
        <form class="myForm" action="editTasksHandler.php" method="post" id="add-form">
            <link rel="stylesheet" href="./css/changetickettheme.css">
            <script src="//code.jquery.com/jquery-1.10.2.js"></script>
            <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
            <script>
                $(function () {
                    $.datepicker.setDefaults({
                        dateFormat: 'yy-mm-dd'
                    });
                    $("#datepicker").datepicker({
                        minDate: 0
                    });
                    $("#datepicker2").datepicker({
                        minDate: 0
                    });
                });
            </script>



            <label for="edit-id">Choose a Ticket<span class="form-required" title="This field is required."></span></label>
            <select name="id" required />
            <option value="" selected="selected">- Select: ID - Customer Name - Location - Open Date - Close Date</option>
            <?php
            foreach ($ticket_names_jd as $i => $item) {
                $line = trim($ticket_names_jd[$i]);
                $pts_jd = explode('^', $line);
                echo "<option value=" . $pts_jd[0] . ">" . $pts_jd[0] . ' - ' . $pts_jd[1] . ' - ' . $pts_jd[2] . ' - ' . $pts_jd[3] ."</option>\n";
            }
            ?>
            </select>

            <p>
                <input type="submit" value="Select Ticket" />
            </p>
            </div>
                <div class="col">
                </div>
            </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>