<?php

  session_start();

  if( $_SESSION['addFaculty'] != 1 )
  {
       header("Location: index.php");
  }

  unset($_SESSION['addFaculty']);

  $_SESSION['adminQuery'] = 1;

 ?>

<html>

  <head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="CSS/addFaculty.css">

  </head>

  <body>

  <form action='addFacultyQuery.php' method='post'>

      Faculty Id:

      <input type='number' name="fId" required>

      <br><br>

      Faculty Name:

      <input type='text' name="fName" required>

      <br><br>

      Faculty Gmail:

      <input type='email' name="gmailId" required>

      <br><br>

      Faculty Event:

      <input type='text' name="eId" required>

      <br><br>

      Faculty Role:

      <input type='text' name="role" required>

      <br><br>

      <input type='submit' class="btn btn-info" name='addFacultySubmit' value='Submit'>

  </form>

</body>

</html>
