<?php

  session_start();

  if( isset($_POST['checkStudentDetailsSubmit']) or $_SESSION['checkStudentDetailsQuery'] == 1 )
  {
    $_SESSION['checkStudentDetailsQuery'] = 0;

    function getQuery($date,$eId)
    {
      require "dataBaseConnection.php";

      echo "<br><br>";

      $query = "select distinct(student_event_details.slot),student_event_details.entryId,student_event_details.role,student_event_details.sId,student_event_details.dates,student_event_details.cCode,student_event_details.fId,student_event_details.status,student_event_details.sNum from student_event_details INNER JOIN student_event ON student_event_details.sId=student_event.sId where student_event_details.dates='$date' and student_event.eId='$eId';" ;

      $result = mysqli_query($connection,$query);

      if( mysqli_num_rows($result) )
      {
        return $result;
      }

      $notice = "No Student Found.";

      die($notice);
    }
  }

  else if( isset($_POST['deleteEntries']) )
  {
    require "dataBaseConnection.php";

    $_SESSION['checkStudentDetailsQuery'] = 1;

    $eId = $_POST['getEventId'];

    $queryDate = $_POST['getDate'];

    $entryIds = explode(',',$_POST['getEntryIds']);

    for($n=sizeof($entryIds),$i=0;$i<$n;$i++)
    {
      if( isset($_POST['checkQuery'.$i]) )
      {

        $query = "delete from student_event_details where entryId=$entryIds[$i]";

        $result = mysqli_query($connection,$query);
      }

      empty($_POST['checkQuery'.$i]);
    }

    empty($entryIds);

    echo "<br><br>";

    echo "<form id='formRefresh' method='post' action='checkStudentDetailsQuery.php'>";

    echo "<input type='hidden' name='queryDate' value='$queryDate'>";

    echo "<input type='hidden' name='eId' value='$eId'>";

    echo "</form>";

    echo
    "
      <script type='text/javascript'>

        document.getElementById('formRefresh').submit();

      </script>

    ";
  }

  else
  {
    echo "Don't be so hasty !! xD";
  }

 ?>

<html>

<head>

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">

  <link href="CSS/checkStudentDetailsQuery.css" rel="stylesheet">

</head>

<body>

  <p id='noteText'>You can Sort the Table with a click on the Column</p>

  <div class="table">

    <form method='post'>

    <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">

      <thead>

        <tr>

          <th class="th-sm">Student Id</th>

          <th class="th-sm">Date</th>

          <th class="th-sm">Time Slot</th>

          <th class="th-sm">Role</th>

          <th class="th-sm">Course Code</th>

          <th class="th-sm">Section Number</th>

          <th class="th-sm">Status</th>

          <th class="th-sm">Delete Entry</th>

        </tr>

      </thead>

      <tbody>

          <?php

            $date = $_POST['queryDate'];

            $eId = $_POST['eId'];

            $result = getQuery($date,$eId);

            $i=0;

            while( $row = mysqli_fetch_assoc($result) )
            {
              echo "<tr>";

              echo "<td>",$row['sId'],"</td>";

              echo "<td>",$row['dates'],"</td>";

              echo "<td>",$row['slot'],"</td>";

              echo "<td>",$row['role'],"</td>";

              echo "<td>",$row['cCode'],"</td>";

              echo "<td>",$row['sNum'],"</td>";

              echo "<td>",$row['status'],"</td>";

              echo "<td>","<input type='checkbox' name='checkQuery$i'>","</td";

              echo "</tr>";

              $entryIds[$i++] = $row['entryId'];
            }

            echo "</div>";

            $string_version = implode(',',$entryIds);

            echo "<input type='hidden' value='$string_version' name='getEntryIds'>";

            echo "<input type='hidden' value='$eId' name='getEventId'>";

            echo "<input type='hidden' value='$date' name='getDate'>";

          ?>

      </tbody>

    </table>

    <input type='submit' class="btn btn-info" value='Delete Records' id='deleteEntries' name='deleteEntries'>

    </form>

  </div>

  <p id="entriesReplace">Entries</p>

  <!-- MDBootstrap Datatables  -->
  <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- MDBootstrap Datatables  -->
  <script type="text/javascript" src="js/addons/datatables.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#dtBasicExample').DataTable();
      $('.dataTables_length').addClass('bs-select');
    });
  </script>

</body>

</html>
