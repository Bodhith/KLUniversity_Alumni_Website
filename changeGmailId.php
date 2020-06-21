<?php

   if( !isset($_POST['changeGmailSubmit']) )
   {
      header("Location: index.php");
   }

   function changeGmailId($newGmailId)
   {
     require "dataBaseConnection.php";

     $uId = $_SESSION['userId'];

     $userType = $_SESSION['userType'];

     if( $userType == 'student' )
     {
       $filler = "sId";
     }

     else if( $userType == 'faculty' )
     {
       $filler = "fId";
     }

     $query = "update $userType set gmailId='$newGmailId' where $filler=$uId;" ;

     $result = mysqli_query($connection,$query);

     $_SESSION['gmailId'] = $newGmailId;
   }

   session_start();

   $oldGmailId = $_SESSION['gmailId'];

   $newGmailId = $_POST['gmailId'];

   changeGmailId($newGmailId);

 ?>

<html>

  <head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="CSS/changeGmailId.css">

  </head>

  <body>
    
    <div class="text">

      <p> Previous Login Gmail Id:-

          <?php

               echo $oldGmailId;

           ?>

      </p>

      <br>

      <p> Updated Login Gmail Id:-

      <?php

          echo $newGmailId;

       ?>

     </p>

    </div>

  </body>

</html>
