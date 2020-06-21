<?php

if( isset($_POST['addCoursesSubmit']) )
{
  session_start();

  $_SESSION['addCourses'] = 1;

  function addCourses($cId)
  {
    require "dataBaseConnection.php";

    $query = "select cId from courses where cId='$cId'";

    $result = mysqli_query($connection,$query);

    if( mysqli_num_rows($result) )
    {
        $note = "Course Already Exists.";

        return $note;
    }

    $query = "insert into courses(cId) values('$cId');" ;

    $result = mysqli_query($connection,$query);

    $note = "Course Added Successfully.";

    return $note;
  }

  $cId = $_POST['cId'];

  $note = addCourses($cId);
}

else
{
  $note = "Don't be so hasty !! xD";
}

 ?>

 <html>

 <head>

   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

   <link rel="stylesheet" href="CSS/addCoursesQuery.css">

 </head>

 <body>

    <?php

        echo "<p>",$note,"</p>";

     ?>

 </body>

 </html>
