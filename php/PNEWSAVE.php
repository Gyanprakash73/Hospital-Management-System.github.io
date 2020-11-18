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
        <title>Save Patient</title>
        <link rel="stylesheet" href="css/bootstrap.css"/>
    </head> 
    <body>
        <table class="table table-bordered">
            <tr bgcolor=blue>
                <td align=center><font SIZE=6 color=white>HOSPITAL MANAGEMENT SYSTEM</font></td>
            </tr>
            <tr bgcolor=red>
                <td ><font size=4 color=white>Save Patient</font></td>
            </tr>
            <?php
            $name=trim($_POST["name"]);
            $sex=trim($_POST["sex"]);
            $addr=trim($_POST["addr"]);
            $error=0;
            if ($name=="") { $error=1; echo "<tr><td><font color=red size=4>Name can't empty</font></td></tr>"; }
            if ($sex=="") { $error=1; echo "<tr><td><font color=red size=4>Sex can't empty</font></td></tr>"; }
            if ($addr=="") { $error=1; echo "<tr><td><font color=red size=4>Address can't empty</font></td></tr>"; }
            if ($error==0)
            {
                mysqli_query($conn,"insert into patient(pname,paddr,psex,pshow) values('".$name."','".$addr."','".$sex."','Y')");
                echo "<tr><td align=center><font size=4 color=green>Successfully Patient Added</font></td></tr>";
                $rs2=mysqli_query($conn,"SELECT max(pno) from patient;");
                while($row=mysqli_fetch_array($rs2))
                    echo "<tr><td align=center>Patient Number: $row[0]</td></tr>";
            }
            else
            {
                echo "<form name=fdadd method=post action=pnewsave.php>";
                echo "<tr><td><table width=750 cellspacing=0 cellpadding=5>";
                echo "<tr><td>Doctor Name</td><td><input type=text name=name size=30 maxlength=30 value='".$name."'></td></tr>";
                echo "<tr><td>Sex</td><td><input type=text name=sex size=30 maxlength=30 value='".$sex."'></td></tr>";
                echo "<tr><td>Address</td><td><input type=text name=addr size=30 maxlength=30 value='".$addr."'></td></tr>";
                echo "</table></td></tr>";
                echo "<tr><td align=center><input type=submit value=Submit></td></tr>";
                echo "</form>";
            }
            echo "<tr><td align=center><a href=../index.html>Continue...</a></td></tr>";
            ?>
        </table>
    </body>
</html>