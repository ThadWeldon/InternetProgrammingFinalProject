<?php
	function pageHead1($img, $title)
	{
        echo "<nav class=\"navbar navbar-expand-lg navbar-dark bg-dark\">";
        echo "<img class=\"img-thumbnail\" src=\"./images/$img\" alt=\"$title\" width=\"200\" height=\"100\">";

  echo <<<_END

  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="createEmployeeAccount.php">Create Employee Account</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
_END;

}

?>