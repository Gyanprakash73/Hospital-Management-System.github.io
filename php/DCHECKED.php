<?php
require('connection.php');
error_reporting(1);
?>
<html>
    <head>
        <title>Doctor Checked</title>
        <link rel="stylesheet" href="css/bootstrap.css"/>
    </head> 
    <body>
        <table class="table table-bordered">
            <tr bgcolor=blue>
                <td align=center><font SIZE=6 color=white>HOSPITAL MANAGEMENT SYSTEM</font></td>
            </tr>
            <tr bgcolor=red>
                <td ><font size=4 color=white>Successful Doctor Checked To Patient Appointment</font></td>
            </tr>
            <?php
            $rno=$_GET["rno"];
            mysqli_query($conn,"delete from appt where atime='$rno'");
            echo "<tr><td align=center><font size=4 color=green>Successfully Checked</font></td></tr>";
            echo "<tr><td align=center><a href=dlogin.php>Continue...</a></td></tr>";
            ?>
        </table>
    </body>
</html>