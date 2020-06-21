<?php

function getEventRoles()
{
  require "dataBaseConnection.php";

  $query = "select role from event_role;" ;

  $result = mysqli_query($connection,$query);

  $index = 0;

  while($row = mysqli_fetch_assoc($result))
  {
      $roles[$index++] = $row['role'];
  }

  return $roles;
}

 ?>
