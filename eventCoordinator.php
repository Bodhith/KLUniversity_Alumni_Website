<?php

  if( !isset($_POST['eventCoordinatorSubmit']) )
  {
      header("Location: index.php");
  }

  require "getFacultyRole.php";

  $fRoles = getFacultyRole();

  if( !(in_array('Coordinator',$fRoles)) )
  {
     die("You are not a Coordinator.");
  }

 ?>

<html>

<head>

  <link rel="stylesheet" href="CSS/evenCoordinator.css">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>

  <script>
    window.parentPage = 1;
  </script>

  <form action="enStudents.php" method="post" class="queryForm">

    Student Id:

    <input type='text' name='userId'>

    <br><br>

    Student Name:

    <input type='text' name='userName'>

    <br><br>

    Gmail Id:

    <input type='email' name='gmailId'>

    <br><br>

    Event:

    <input list='eventsList' name='events' id='events'>

    <datalist id='eventsList'>

      <?php

        require "getEvents.php";

        for($i=0,$n=sizeof($events);$i<$n;$i++)
        {
          echo "<option value=$events[$i]>";
        }

     ?>

    </datalist>

    <br><br>

    Student Role:

    <input list='userRoleList' name='userRole'>

    <datalist id='userRoleList'>

      <?php

          require "getEventRoles.php";

          $roles = getEventRoles();

          for($i=0,$n=sizeof($roles);$i<$n;$i++)
          {
            echo "<option value=$roles[$i]>";
          }

          ?>

    </datalist>

    <br><br>

    <input type='submit' class="btn btn-info" value='Submit' name='enStudentSubmit'>

  </form>

  <?php

      $_SESSION['addEventRoles'] = 1;

      $_SESSION['checkStudentDetails'] = 1;

   ?>

  <a href="addEventRoles.php" style='text-decoration:none' id='addMoreRoles'> Add More Roles </a>

  <br><br>

  <a href="checkStudentDetails.php" style='text-decoration:none' id='checkStudentDetails'> Check Students Details </a>

</body>

</html>
