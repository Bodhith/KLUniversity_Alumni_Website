<?php

date_default_timezone_set("Asia/Calcutta");

$serverName = "localhost:3307";

$dataBaseUsername = "root";

$dataBasePassword = "";

$dataBaseName = "attendance";

$connection = mysqli_connect($serverName, $dataBaseUsername, $dataBasePassword, $dataBaseName);

if( !$connection )
{
  echo "Connection Failed : " .mysqli_connect_error();

  exit();
}

?>
