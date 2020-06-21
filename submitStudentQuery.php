<?php

  if( isset($_POST['studentSubmit']) )
  {
    session_start();

    require "dataBaseConnection.php";

    echo "<br><br>";

    $userId = $_SESSION['userId'];

    $eventId = $_POST['events'];

    $userRole = $_POST['userRole'];

    $course = $_POST['courses'];

    $date = $_POST['date'];

    $userSec = $_POST['sections'];

    $fId = $_POST['faculty'];

    $slot = $_POST['slot'];

    $status = 'pending';

    $query = "select * from student_event,events where student_event.sId=$userId and student_event.role='$userRole' and events.eId='$eventId' and '$date'>=events.sDate and '$date'<=events.eDate;" ;

    $result0 = mysqli_query($connection,$query);

    $query = "select * from student_event_details where sId=$userId and slot=$slot and dates='$date';";

    $result1 = mysqli_query($connection,$query);

    if( mysqli_num_rows($result0) and  !mysqli_num_rows($result1) )
    {
      $query = "insert into student_event_details(cCode,fId,sNum,sId,slot,dates,status,role) values ('$course',$fId,$userSec,$userId,$slot,'$date','$status','$userRole'); ";

      $result = mysqli_query($connection,$query);

      $note = "Your Query is Sent Successfully.";
    }

    else
    {
      $note = "Submit Query Failed: Check the date,event id,role, etc.";
    }
  }

  else
  {
    $note = "Don't be so hasty !! xD";
  }

 ?>

 <html>

 <head>

   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

   <link rel="stylesheet" href="CSS/submitStudentQuery.css">

 </head>

 <body>

   <?php

      echo "<p>",$note,"</p>";

    ?>

 </body>

 </html>
