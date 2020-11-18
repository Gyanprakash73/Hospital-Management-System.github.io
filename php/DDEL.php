<?php
require('connection.php');
?>

<html>
    <head>
        <title>Delete Doctors</title>
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
                <td ><font size=4 color=white>Doctors Delete</font></td>
            </tr>
            <?php
            error_reporting(1);
            if($_GET['rno']!=null)
            {
                $todel=$_GET['rno'];
                mysqli_query($conn,"update doct SET dshow='N' where dno='$todel' ;");
                echo "<tr><td align=center><font size=4 color=green>Successfully Doctor Deleted</font></td></tr>";
            }
            if($_GET['fno']!=null)
            {
                $fno=$_GET['fno'];
                mysqli_query($conn,"delete from doct where dno='$fno';");
                echo "<tr><td align=center><font size=4 color=green>Final Doctor Deleted</font></td></tr>";
            }
            echo "<tr><td align=center><a href=dlist.php>Continue...</a></td></tr>";
            ?>
        </table>
    </body>
</html> 