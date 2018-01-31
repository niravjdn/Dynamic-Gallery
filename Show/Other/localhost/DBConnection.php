<?php
DEFINE('DB_USER','root');
DEFINE('DB_PWD','');
DEFINE('DB_HOST','localhost');
DEFINE('DB_NAME','gallery');

	$con=mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_NAME);
	if($con)
	{
		//echo "Data base Connection Sucess"."<br>";
	}
	else
	{
		//echo"Sorry....<h1>mysql_error()</h1>";
	}
function returncon()
{
		$con=mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_NAME);
		return $con;
}
?>
