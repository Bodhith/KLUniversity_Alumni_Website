<?php

  if( !isset($_POST['regularFacultySubmit']) )
  {
      header("Location: index.php");
  }

  require "getFacultyRole.php";

  $_SESSION['regularFacultyQuery'] = 0;

  $fRoles = getFacultyRole();

  if( !(in_array('RegularFaculty',$fRoles)) )
  {
     die("You are not a Regular Faculty.");
  }

 ?>

<html>

<head>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <link rel="stylesheet" href="CSS/regularFaculty.css">

</head>

<body>

  <form action='attendanceInchargeQuery.php' method='post'>

    Date:

    <input type='date' name='queryDate' value='<?php echo date('Y-m-d');?>' required>

    <br><br>

    Section:

    <input type='number' name='sNum' required>

    <br><br>

    Course:

    <input type='text' name='cCode' required>

    <br><br>

    <input type='submit' class='btn btn-info' value='Submit' name='queryDateSubmit'>

    <br><br>

  </form>

</body>

</html>
