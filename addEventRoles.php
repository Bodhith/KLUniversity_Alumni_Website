<?php

  session_start();

  if( $_SESSION['addEventRoles'] != 1 )
  {
    header("Location: index.php");
  }

  unset($_SESSION['addEventRoles']);

 ?>

<html>

<head>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <link rel="stylesheet" href="CSS/addEventRoles.css">

</head>

<body>

  <form action="addEventRolesQuery.php" method="post">

    Events:

    <input list='eventsList' name='events'>

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

    Roles:

    <input list='userRoleList' name='userRole'>

    <datalist id='userRoleList'>

      <?php

          require "getStudentRoles.php";

          for($i=0,$n=sizeof($roles);$i<$n;$i++)
          {
            echo "<option value=$roles[$i]>";
          }

          ?>

    </datalist>

    <br><br>

    <input type="submit" class="btn btn-info" value="Submit" name="addEventRolesSubmit">

  </form>

</body>

</html>
