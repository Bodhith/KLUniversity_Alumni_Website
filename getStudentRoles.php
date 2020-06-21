<?php

    function getStudentRoles()
    {
      session_start();

      require "dataBaseConnection.php";

      $userId = 1;

      $query = "select DISTINCT(role) from student_event where sId=$userId ;";

      $result = mysqli_query($connection,$query);

      $index = 0;

      while($row = mysqli_fetch_assoc($result))
      {
          $roles[$index++] = $row['role'];
      }

      return $roles;
    }

    $roles = getStudentRoles();
 ?>
