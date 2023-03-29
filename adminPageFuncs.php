<?php
	function pageHead1($img, $title, $logged)
	{
        echo "<nav class=\"navbar navbar-expand-lg navbar-dark bg-dark\">";
        echo "<img class=\"img-thumbnail\" src=\"./images/$img\" alt=\"$title\" width=\"200\" height=\"100\">";
if($logged == true)
{
  echo <<<_END

  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="adminHome.php">Admin Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="createTasks.php">Create Task</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="assignTasks.php">Assign Tasks</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Employees Tasks
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="yourOrders.php">Daily Tasks</a></li>
            <li><a class="dropdown-item" href="yourOrders.php">Weekly Tasks</a></li>
          </ul>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
      </ul>
    </div>
  </div>
</nav>
_END;
}
  }
?>