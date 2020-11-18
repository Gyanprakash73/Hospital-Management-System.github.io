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
</h3>
<html>
    <head>
        <title>Doctor Login</title>
        <link rel="stylesheet" href="css/bootstrap.css"/>
    </head> 
    <body>
        <table class="table table-bordered">
            <tr bgcolor=blue>
                <td align=center><font SIZE=6 color=white>HOSPITAL MANAGEMENT SYSTEM</font></td>
            </tr>
            <tr bgcolor=red>
                <td ><font size=4 color=white>Doctor Login</font></td>
            </tr>
            <form name=fdadd method=post action=DCHECK.php>
                <tr>
                    <td>
                        <table width=750 cellspacing=0 cellpadding=5>
                            <tr>
                                <td>Doctor Id</td>
                                <td><input type=text name=id size=30 maxlength=30></td>
                                <td><input type="submit" value="Login"></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </form>
        </table>
    </body>
</html>