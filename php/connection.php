<?php 
$server="localhost";
$user="root";
$passwd="";
$dbase="hospital";
$conn=mysqli_connect($server,$user,$passwd,$dbase);
session_start();
error_reporting(1);
if(!$conn)
{
  echo "<tr><td><font color=red size=4>Connection Error</font></td></tr>";
  die();
}
mysqli_connect("localhost","root","");
mysqli_select_db("hospital"); 
if($_SESSION['admin']=="")
{
    header('login.php');
}
?>

<h3 style="background:#990000;padding:20px;color:#FFFFFF;margin:0px">
	<span>Welcome</span>
	<span style="float:right"><a style="color:#FFFFFF" href="logout.php">Logout</a></span>
</h3>