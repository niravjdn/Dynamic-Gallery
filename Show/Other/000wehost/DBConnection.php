<?php
DEFINE('DB_USER','a4002523_root');
DEFINE('DB_PWD','abc123');
DEFINE('DB_HOST','mysql6.000webhost.com');
DEFINE('DB_NAME','a4002523_convo16');

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
