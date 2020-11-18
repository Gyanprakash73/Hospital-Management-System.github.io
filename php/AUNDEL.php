
<?php
require('connection.php');
?>

<html>
    <head>
        <title>Delete Appointment</title>
        <link rel="stylesheet" href="css/bootstrap.css"/>
    </head> 
    <body>
        <table class="table table-bordered">
            <tr bgcolor=blue>
                <td align=center><font SIZE=6 color=white>HOSPITAL MANAGEMENT SYSTEM</font></td>
            </tr>
            <tr>
                <td>
                    <table align=center width=750 cellspacing=0 cellpadding=5>
                        <tr>
                            <td align=center><a href=dlist.php>Doctors</td>
                            <td align=center><a href=plist.php>Patients</td>
                            <td align=center><a href=alist.php>Appointments</td>
                    </table>
                </td>
            </tr>
            <tr bgcolor=red>
                <td ><font size=4 color=white>Appointment</font></td>
            </tr>
            <?php
            error_reporting(1);
            if($_GET['rno']!=null)
            {
                $rno=$_GET["rno"];
                mysqli_query($conn,"update appt set ashow='Y' where ano='$rno'");
                echo "<tr><td align=center><font size=4 color=green>Successfully Record Recovered</font></td></tr>";
            }
            if($_GET['fno']!=null)
            {
                $fno=$_GET['fno'];
                mysqli_query($conn,"delete from appt where ano='$fno';");
                echo "<tr><td align=center><font size=4 color=green>Final Appointement Deleted</font></td></tr>";
            }
            if($_GET['dno']!=null)
            {
                $dno=$_GET['dno'];
                mysqli_query($conn,"update appt SET ashow='N' where ano='$dno' ;");
                echo "<tr><td align=center><font size=4 color=green>Successfully Appointement Delete</font></td></tr>";
            }
            echo "<tr><td align=center><a href=alist.php>Continue...</a></td></tr>";
            ?>
        </table>
    </body>
</html>