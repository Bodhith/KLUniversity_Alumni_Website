<?php

  session_start();

  if( $_SESSION['checkStatus'] != 1 )
  {
      header("Location: index.php");
  }

  require "dataBaseConnection.php";

  $userId = $_SESSION['userId'];

  $query = "select * from student_event_details where sId=$userId";

  $result = mysqli_query($connection,$query);

?>


<html>

<head>

  <meta http-equiv='refresh' content='50;url=checkStatus.php'>

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">

  <link href="CSS/checkStatus.css" rel="stylesheet">

</head>

<body>

  <p id='noteText'>You can Sort the Table with a click on the Column</p>

  <div class="table">

    <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">

      <thead>

        <tr>

          <th class="th-sm">Date</th>

          <th class="th-sm">Time Slot</th>

          <th class="th-sm">Faculty Id</th>

          <th class="th-sm">Course Code</th>

          <th class="th-sm">Status</th>

        </tr>

      </thead>

      <tbody>

        <?php

          while($row = mysqli_fetch_assoc($result))
          {
              echo "<tr>";

              echo '<td>',$row['dates'],'</td>';

              echo '<td>',$row['slot'],'</td>';

              echo '<td>',$row['fId'],'</td>';

              echo '<td>',$row['cCode'],'</td>';

              echo '<td>',$row['status'],'</td>';

              echo "</tr>";
          }

        ?>

      </tbody>

    </table>

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
