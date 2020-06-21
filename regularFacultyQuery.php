<?php

  session_start();

  if( isset($_POST['queryDateSubmit']) or $_SESSION['regularFacultyQuery'] == 1 )
  {
    $_SESSION['attendanceInchargeQuery'] = 0;

    $flag = TRUE;

    function getQuery($date,$sNum,$cCode,$fId)
    {
      require "dataBaseConnection.php";

      echo "<br><br>";

      $query = "select * from student_event_details where dates='$date' and sNum=$sNum and cCode='$cCode' and fId=$fId and aStatus='Approved';" ;

      $result = mysqli_query($connection,$query);

      if( mysqli_num_rows($result) )
      {
        return $result;
      }

      $notice = "No Student Found.";

      die($notice);
    }
  }

  else if( isset($_POST['approveQuerySubmit']) or isset($_POST['declineQuerySubmit']) )
  {
      require "dataBaseConnection.php";

      $flag = FALSE;

      if( isset($_POST['declineQuerySubmit']) )
      {
        $status = "Declined";
      }

      else if( isset($_POST['approveQuerySubmit']) )
      {
        $status = "Approved";
      }

      $string_version = $_POST['getEntryIds'];

      $entryIds = explode(',', $string_version);

      empty($subQuery);

      for($i=0,$n=sizeof($entryIds),$subQuery=" ";$i<$n;$i++)
      {
        if( isset($_POST['checkQuery'.$i]) )
        {
            $subQuery .= "entryId=".$entryIds[$i]." or " ;
        }
      }

      $subQuery = rtrim($subQuery," or ");

      $query = "update student_event_details set status='$status' where ".$subQuery.";" ;

      $result = mysqli_query($connection,$query);

      echo "<br><br>";

      $_SESSION['attendanceInchargeQuery'] = 1;

      $queryDate = $_POST['queryDate'];

      $sNum = $_POST['sNum'];

      $cCode = $_POST['cCode'];

      echo
      "
        <form id='tableForm' method='post'>

           <input type='hidden' value='$queryDate' name='queryDate'>

           <input type='hidden' value='$sNum' name='sNum'>

           <input type='hidden' value='$cCode' name='cCode'>

        </form>

      ";

      echo
      "
      <script>

        document.getElementById('tableForm').submit();

      </script>

      ";
  }

  else
  {
    echo "Don't be so hasty !! xD";

    header("Location: index.php");
  }

 ?>

<html>

<head>

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">

  <link href="CSS/attendanceInchargeQuery.css" rel="stylesheet">

</head>

<body>

  <script>
    function toggleBoxes(n, status) {
      for (var i = 0; i < n; i++) {
        document.getElementsByName("checkQuery" + i)[0].checked = status;
      }
    }
  </script>

  <p id='noteText'>You can Sort the Table with a click on the Column</p>

  <form method='post'>

    <?php

    if( $flag )
    {

      $date = $_POST['queryDate'];

      $sNum = trim($_POST['sNum']);

      $cCode = $_POST['cCode'];

      $fId = $_SESSION['userId'];

      $result = getQuery($date,$sNum,$cCode,$fId);

      $i=0;

      echo "<input type='hidden' value='$date' name='queryDate'>";

      echo "<input type='hidden' value='$sNum' name='sNum'>";

      echo "<input type='hidden' value='$cCode' name='cCode'>";

      empty($entryIds);

      ?>

    <div class="table">

      <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">

        <thead>

          <tr>

            <th class="th-sm">Student Id</th>

            <th class="th-sm">Subject</th>

            <th class="th-sm">Section</th>

            <th class="th-sm">Status</th>

            <th class="th-sm">Approve-Decline</th>

          </tr>

        </thead>

        <tbody>

          <?php

          while( $row = mysqli_fetch_assoc($result) )
          {
            echo "<tr>";

            echo "<td>",$row['sId'],"</td>";

            echo "<td>",$row['cCode'],"</td>";

            echo "<td>",$row['sNum'],"</td>";

            echo "<td>",$row['status'],"</td>";

            echo "<td>","<input type='checkbox' name='checkQuery$i'>","</td> ";

            echo "</tr>";

            $entryIds[$i++] = $row['entryId'];
          }

          echo "</tbody>";

          $string_version = implode(',',$entryIds);

          echo "<input type='hidden' value='$string_version' name='getEntryIds'>";

          }

       ?>

      </table>

      <?php

      if( $flag )
      {
        echo
        "
          <input type='button' id='btn_1' class='btn btn-info' value='Select All' name='selectAllBoxes' onclick='toggleBoxes($i,true)'>
        ";

        echo
        "
          <input type='button' id='btn_2' class='btn btn-info' value='Deselect All' name='deselectAllBoxes' onclick='toggleBoxes($i,false)'>
        ";
      }

    ?>

      <?php

      if( $flag )
      {

        echo
        "
          <input type='submit' id='btn_3' class='btn btn-info' value='Approve' name='approveQuerySubmit'>

          <input type='submit' id='btn_4' class='btn btn-info' value='Decline' name='declineQuerySubmit'>
        ";

      }

    ?>

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

  </form>

</body>

</html>
