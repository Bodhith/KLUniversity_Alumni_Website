<?php

  if( isset($_POST['enStudentSubmit']) )
  {
    require "dataBaseConnection.php";

    $userId = $_POST['userId'];

    $userName = $_POST['userName'];

    $userRole = $_POST['userRole'];

    $eventId = $_POST['events'];

    $gmailId = $_POST['gmailId'];

    $query = "select sId from student_event where sId=$userId and eId='$eventId' and role='$userRole'";

    $result = mysqli_query($connection,$query);

    if( mysqli_num_rows($result) )
    {
      $note = "User Already Exists.";
    }

    else
    {

      $query = "insert into student(sId,gmailId,sName) values ($userId,'$gmailId','$userName');";

      $result = mysqli_query($connection,$query);

      $query = "insert into student_event(sId,eId,role) values ($userId,'$eventId','$userRole');";

      $result = mysqli_query($connection,$query);

      $note = "Successfully Added.";

    }
  }

  else
  {
    echo "Don't be so hasty !! xD";
  }

 ?>

<html>

<head>

  <link rel="stylesheet" href="CSS/enStudents.css">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>

  <?php

      echo "<p>",$note,"</p>";

    ?>

</body>

</html>
