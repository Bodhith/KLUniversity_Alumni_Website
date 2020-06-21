<?php

	error_reporting(0);

	function checkUser($uId,$gmailId,$userType)
	{
		require "dataBaseConnection.php";

		echo "<br><br>";

		if( $userType == "student" )
		{
			$filler = "sId";
		}

		else if( $userType == "faculty" )
		{
			$filler = "fId";
		}

		$query = "select * from $userType where $filler=$uId and gmailId='$gmailId';" ;

		$result = mysqli_query($connection,$query);

		if( mysqli_num_rows($result) == 1 )
		{
				return TRUE;
		}

		else
		{
			echo "<center><font size='40px'>Login Failed. No such user exists.</font></center>";

			return FALSE;
		}

	}

	session_start();

	if( $_SESSION['validate'] == 1 )
	{

		require "dataBaseConnection.php";

		echo "<br><br>";

		$userName = $_POST['userName'];

		$userType = $_POST['userType'];

		$gmailId = $_POST['gmailId'];

		$_SESSION['userId'] = $userName;

		$_SESSION['userType'] = $userType;

		$_SESSION['gmailId'] = $gmailId;

		if( checkUser($userName,$gmailId,$userType) )
		{
			if( $userType == "student" )
			{
				$_SESSION['students'] = 1;

				header("Location: students.php");
			}

			else if( $userType == "faculty" )
			{

				$_SESSION['faculty'] = 1;

				header("Location: faculty.php");
			}
		}
	}

	else
	{
		echo "<center><font size='40px'>Don't be so hasty !! xD</font></center>";
	}

?>

<html>

	<body background="IMAGES/STUDENTS_BACKGROUND_1.jpg">
	</body>

</html>
