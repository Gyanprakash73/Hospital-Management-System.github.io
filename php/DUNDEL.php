<html>
    <head>
        <title>Recover Doctor</title>
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
                <td ><font size=4 color=white>Recover Doctor</font></td>
            </tr>
            <?php
            require('connection.php');
            error_reporting(1);
            if($_GET['rno']!=null)
            {
                $rno=$_GET["rno"];
                mysqli_query($conn,"update doct set dshow='Y' where dno='$rno'");
                echo "<tr><td align=center><font size=4 color=green>Successfully Record Recovered</font></td></tr>";
            }
            echo "<tr><td align=center><a href=dlist.php>Continue...</a></td></tr>";
            ?>
        </table>
    </body>
</html> 