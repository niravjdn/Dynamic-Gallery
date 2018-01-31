<?php
DEFINE('DB_USER','uvpceac_con2016');
DEFINE('DB_PWD','VZ%xd^*AhdMh');
DEFINE('DB_HOST','localhost');
DEFINE('DB_NAME','uvpceac_convo2016');

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
