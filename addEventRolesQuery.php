<?php

  if( isset($_POST['addEventRolesSubmit']) )
  {
    session_start();

    error_reporting(0);

    require "dataBaseConnection.php";

    $eId = $_POST['events'];

    $role = $_POST['userRole'];

    $query = "select * from faculty_event where fId=$_SESSION[userId] and role='Coordinator' and eId='$eId'";

    $result = mysqli_query($connection,$query);

    if( mysqli_num_rows($result) )
    {
      $query = "select eId from event_role where eId='$eId' and role='$role'";

      $result = mysqli_query($connection,$query);

      if( mysqli_num_rows($result) )
      {
        $note = "Role Already Exists.";
      }

      else
      {
          $query = "insert into event_role(eId,role) values ('$eId','$role'); ";

          $result = mysqli_query($connection,$query);

          $note = "Role Added Successfully.";
        }

      }

      else
      {
        $note = " No Permission.";
      }

    echo $note;
  }

  else
  {
    echo "Don't be so hasty !! xD";
  }

 ?>

<html>

<head>

  <link rel="stylesheet" href="CSS/addEventRolesQuery.css";

</head>

<body>

</body>

</html>
