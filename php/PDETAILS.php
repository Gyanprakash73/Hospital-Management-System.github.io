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
        <title>Patients Details</title>
        <link rel="stylesheet" href="css/bootstrap.css"/>
    </head> 
    <body>
        <table class="table table-bordered">
            <tr bgcolor=blue>
                <td align=center><font SIZE=6 color=white>HOSPITAL MANAGEMENT SYSTEM</font></td>
            </tr>
            <tr bgcolor=red>
                <td ><font size=4 color=white>Exiting Patient Details</font></td>
            </tr>
            <form name=fdadd method=post action=pdetailsshow.php>
                <tr>
                    <td>
                        <table width=750 cellspacing=0 cellpadding=5>
                            <tr>
                                <td>Patient Number</td>
                                <td><input type=text name=number size=30 maxlength=30></td>
                                <td><input type="submit" value="Show"></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </form>
            <tr bgcolor=red>
                <td ><font size=4 color=white>Register New Patient</font></td>
            </tr>
            <form name=fdadd method=post action=pnewsave.php>
                <tr>
                    <td>
                        <table width=750 cellspacing=0 cellpadding=5>
                            <tr>
                                <td>Patient Name</td>
                                <td><input type=text name=name size=30 maxlength=30></td>
                            </tr>
                            <tr>
                                <td>Sex</td>
                                <td><input type=text name=sex size=30 maxlength=30></td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td><input type=text name=addr size=30 maxlength=30></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align=center><input type=submit value=Submit></td>
                </tr>
            </form>
        </table>
    </body>
</html>