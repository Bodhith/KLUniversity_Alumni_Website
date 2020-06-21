<?php

  function getFacultyRole()
  {
      session_start();

      require "dataBaseConnection.php";

      echo "<br><br>";

      $uId = $_SESSION['userId'];

      $query = "select * from faculty where fId=$uId;" ;

      $result = mysqli_query($connection,$query);

      $index=0;

      if( mysqli_num_rows($result) == 1 )
      {
          $userRole[$index++] = 'RegularFaculty';
      }

      $query = "select role from faculty_event where fId=$uId;" ;

      $result = mysqli_query($connection,$query);

      while( $row = mysqli_fetch_assoc($result) )
      {
        $userRole[$index++] = $row['role'];
      }

      return $userRole;
}

 ?>
