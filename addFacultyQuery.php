<?php

if( isset($_POST['addFacultySubmit']) )
{
  session_start();

  $_SESSION['addFaculty'] = 1;

  function addFaculty($fId,$fName,$gmailId,$eId,$role)
  {
    require "dataBaseConnection.php";

    echo "<br><br>";

    $query ="select eId from events where eId='$eId'";

    $result = mysqli_query($connection,$query);

    if( !mysqli_num_rows($result) )
    {
        $note = "No such Event.";

        return $note;
    }

    $query = "select faculty.fId from faculty,faculty_event where faculty.fId=$fId and faculty_event.fId=$fId and faculty_event.eId='$eId' and faculty_event.role='$role';" ;

    $result = mysqli_query($connection,$query);

    if( mysqli_num_rows($result) )
    {
        $note = "Already Exists";
    }

    else
    {
        $query = "select fId from faculty where fId=$fId;" ;

        $result = mysqli_query($connection,$query);

        if( mysqli_num_rows($result) )
        {
          $query = "insert into faculty_event(fId,eId,role) values($fId,'$eId','$role');" ;

          $result = mysqli_query($connection,$query);
        }

        else
        {
          $query = "insert into faculty(fId,fName,gmailId) values ($fId,'$fName','$gmailId'); ";

          $result = mysqli_query($connection,$query);

          $query = "insert into faculty_event(fId,eId,role) values($fId,'$eId','$role');" ;

          $result = mysqli_query($connection,$query);
        }

        $note = "Added Successfully";
    }

    return $note;

  }

  $fId = $_POST['fId'];

  $fName = $_POST['fName'];

  $gmailId = $_POST['gmailId'];

  $eId = $_POST['eId'];

  $role = $_POST['role'];

  $note = addFaculty($fId,$fName,$gmailId,$eId,$role);
}

else
{
  $note = "Don't be so hasty !! xD";
}

 ?>

 <html>

 <head>

   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

   <link rel="stylesheet" href="CSS/addFacultyQuery.css">

 </head>

 <body>

    <?php

        echo "<p>",$note,"</p>";

     ?>

 </body>

 </html>
