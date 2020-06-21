<?php

  session_start();

  if( $_SESSION['students'] != 1 )
  {
       header("Location: index.php");
  }

 ?>

<html>

<head>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <link rel="stylesheet" href="CSS/students.css">

  <script>

    $(document).ready(function()
    {
      $('#events').on('change',function()
      {
         $.ajax({
           type: 'post',
           url: 'getStudentEvents.php',
           dataType: 'json',
           data:
            {
              userId: $('#studentIdNumber').text(),
              eventId: $('#events').val()
            },
            success: function(result)
            {
              var event = $('#events').val();
              if( jQuery.inArray(event,result) == -1 )
              {
                $('#noteTextEventId').text("Invalid");
              }
              else
              {
                $('#noteTextEventId').text("");
              }
            }
         });
      });
    });

  </script>

</head>

<body>

  <br><br>

  <div class='studentProfile'>

    <p id="studentsId"> Logged in Id :

      <?php

        echo "<p id='studentIdNumber'>";

        echo $_SESSION['userId'];

        echo "</p>";

     ?>

    </p>

    <br>

    <p id="studentsGmail">

      Your Gmail :

      <?php

      echo $_SESSION['gmailId'];

     ?>

    </p>

  </div>

  <br><br>

  <div class="studentsForm">

    <form action="submitStudentQuery.php" method='post'>

      Events:

      <input type='text' id='events' name='events'>

      <div id='noteTextEventId'></div>

      <br><br>

      Role:

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

      Courses:

      <input list='courseList' name='courses'>

      <datalist id='courseList'>

        <?php

            require "getCourses.php";

            for($i=0,$n=sizeof($courses);$i<$n;$i++)
            {
              echo "<option value=$courses[$i]>";
            }

            ?>

      </datalist>

      <br><br>

      Date:

      <?php

        $currDate = date('Y-m-d');

        echo "<input type='date' value=$currDate name='date'> ";

      ?>

      <br><br><br>

      Section:

      <input list='secList' name='sections'>

      <br><br>

      <datalist id='secList'>

        <?php

          for($i=1,$n=40;$i<=$n;$i++)
          {
            echo "<option value=$i>";
          }

         ?>

      </datalist>

      <br>

      Faculty Id:

      <input list='fList' name='faculty'>

      <br><br>

      <datalist id='fList'>

        <?php

          require "dataBaseConnection.php";

          $query = "select * from faculty;";

          $result = mysqli_query($connection,$query);

          while($row = mysqli_fetch_assoc($result))
          {
            echo "

              <option value='$row[fId]'>

            ";
          }

       ?>

      </datalist>

      <br>

      Time Slot:

      <input list='slotList' name='slot'>

      <br><br>

      <datalist id='slotList'>

        <?php

        for($i=0;$i<8;$i++)
        {
          echo "

            <option value=$i>

          ";
        }

       ?>

      </datalist>

      <br>

      <div class="container">

        <input type='submit' class="btn btn-info" value='Submit' name='studentSubmit'>

      </div>

    </form>

  </div>

  <?php

        $_SESSION['checkStatus'] = 1;

     ?>

  <a href="checkStatus.php" style='text-decoration:none'>CheckStatus</a>

  <br><br>

  <div class="changeGmail">

    <form action='newGmailId.php' method='post'>

      <div class="container">

        <input type='submit' class="btn btn-info" value='Change Gmail' name='attendanceInchargeSubmit'>

      </div>

    </form>

  </div>

</body>

</html>
