<?php 
 
function openconn()
{
echo "<br><br><br><br>HII";
	$host="localhost";
	$user="root";
	$pass="";
	$db="logtable";
	$conn = new mysqli($host,$user,$pass,$db) or die("Unable to connect".$conn->err);
	return $conn;
}
function closeconn($conn)
{
	$conn->close();
}
?>