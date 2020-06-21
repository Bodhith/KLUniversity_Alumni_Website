<?php

    session_start();

    $flag = FALSE;

    if( isset($_POST['adminLoginSubmit']) or $_SESSION['adminQuery'] == 1 )
    {
          unset($_SESSION['adminQuery']);

          $flag = TRUE;
    }

    else
    {
      echo "Don't be so hasty !! xD";

      header("Refresh:5; url=admin.php");
    }

  if( $flag )
  {
    $_SESSION['addEvent'] = 1;

    $_SESSION['addFaculty'] = 1;

    $_SESSION['addCourses'] = 1;

  }

  ?>

<html>

<head>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <link rel="stylesheet" href="CSS/adminQuery.css">

</head>

<body>

  <div class='adminLinks'>

    <a href='addEvent.php' id='addEvent' style='text-decoration:none'> Add a Event </a>

    <br><br>

    <a href='addFaculty.php' id='addFaculty' style='text-decoration:none'> Add Faculty </a>

    <br><br>

    <a href='addCourses.php' id='addCourses' style='text-decoration:none'> Add Courses </a>

  </div>

</body>

</html>
