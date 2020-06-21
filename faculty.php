<?php

  session_start();

  if( $_SESSION['faculty'] != 1 )
  {
       header("Location: index.php");
  }

 ?>

<html>

  <head>

      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

      <link rel="stylesheet" href="CSS/faculty.css">

  </head>

  <body>

  <form action='eventCoordinator.php' method='post'>

    <input type='submit'class="btn btn-info" value='Event Coordinator' name='eventCoordinatorSubmit'>

  </form>

  <br><br>

  <form action='attendanceIncharge.php' method='post'>

    <input type='submit' class="btn btn-info" value='Attendance Incharge' name='attendanceInchargeSubmit'>

  </form>

  <form action='regularFaculty.php' method='post'>

    <input type='submit'class="btn btn-info" value='Regular Faculty' name='regularFacultySubmit'>

  </form>

  <br><br>

  <form action='newGmailId.php' method='post'>

    <input type='submit' class="btn btn-info" value='Change Gmail' name='newGmailIdSubmit'>

  </form>

</body>

</html>
