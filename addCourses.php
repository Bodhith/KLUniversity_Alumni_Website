<?php

  session_start();

  if( $_SESSION['addCourses'] != 1 )
  {
       header("Location: index.php");
  }

  unset($_SESSION['addCourses']);

  $_SESSION['adminQuery'] = 1;

 ?>

<html>

<head>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <link rel="stylesheet" href="CSS/addCourses.css">

</head>

<body>

  <form action='addCoursesQuery.php' method='post'>

      Course Name:

      <input type='text' name="cId">

      <br><br><br><br>

      <input type='submit' class='btn btn-info' name='addCoursesSubmit' value='Submit'>

  </form>

</body>

</html>
