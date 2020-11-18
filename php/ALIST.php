<?php
require('connection.php');
error_reporting(1);
?>

<html>
    <head>
        <title>HOSPITAL MANAGEMENT SYSTEM</title>
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
                        </tr>
                    </table>
                </td>
            </tr>
            <tr bgcolor=red>
                <td ><font size=4 color=white>Appointments List</font></td>
            </tr>
            <tr>
                <td><a href=app.php>Add New Appointments</a></td>
            </tr>
            <tr>
                <td>
                    <table width=950 cellspacing=0 cellpadding=5 border=1>
                        <tr bgcolor=blue>
                            <th align=center>S No</th>
                            <th align=center>Appointment Number</th>
                            <th align=center>Patient Name</th>
                            <th align=center>Doctor Name</th>
                            <th align=center>Time</th>
                            <th align=center>Date</th>
                            <th align=center>Options</th>
                        </tr>
            
                        <?php
                        $rs1=mysqli_query($conn,"SELECT * from appt where ashow='Y' order by ano");
                        $sno=1;
                        $c=0;
                        while( $row=mysqli_fetch_array($rs1))
                        {
                        $rs2=mysqli_query($conn,"SELECT pname from patient where pno='$row[2]'");
                        $rs3=mysqli_query($conn,"SELECT dname from doct where dno='$row[1]'");
                        $rs22=mysqli_fetch_assoc($rs2);
                        $rs33=mysqli_fetch_assoc($rs3);
                        $c=$c+1;
                        if($c%2==0)
                            $bg='#dedede';
                        else
                            $bg='#fff';
                        echo "<tr><td bgcolor=$bg>$sno</td><td bgcolor=$bg align=center>$row[0]</td><td bgcolor=$bg>$rs22[pname]</td><td bgcolor=$bg>$rs33[dname]</td><td bgcolor=$bg>$row[3]</td><td bgcolor=$bg>$row[5]</td><td bgcolor=$bg><a href=aundel.php?dno=".$row[0].">Delete</a></td></tr>";
                        $sno++;
                        }
                        if($sno==1)
                        echo "<tr><td align=center><font size=4 color=red>Records Not Found</font></td></tr>";
                        ?>
                    </table>
                </td>
            </tr>
            <tr>
                <td align=center><hr></td>
            </tr>
            <tr bgcolor=red>
                <td><font size=4 color=white>Deleted Records</font></td>
            </tr>
            <tr>
                <td>
                    <table width=950 cellspacing=0 cellpadding=5 border=1>
                        <tr bgcolor=blue>
                            <th align=center>S No</th>
                            <th align=center>Appointment Number</th>
                            <th align=center>Patient Name</th>
                            <th align=center>Doctor Name</th>
                            <th align=center>Time</th>
                            <th align=center>Date</th>
                            <th align=center>Options</th>
                        </tr>
                        <?php
                        $rs1=mysqli_query($conn,"SELECT * from appt where ashow='N' order by ano");
                        $sno=1;
                        $c=0;
                        while($row=mysqli_fetch_array($rs1)) {
                            $rs2=mysqli_query($conn,"SELECT pname from patient where pno='$row[2]'");
                            $rs3=mysqli_query($conn,"SELECT dname from doct where dno='$row[1]'");
                            $rs22=mysqli_fetch_assoc($rs2);
                            $rs33=mysqli_fetch_assoc($rs3);
                            $c=$c+1;
                            if($c%2==0)
                                $bg='#dedede';
                            else
                                $bg='#fff';
                            echo "<tr><td bgcolor=$bg>$sno</td><td bgcolor=$bg align=center>$row[0]</td><td bgcolor=$bg>$rs22[pname]</td><td bgcolor=$bg>$rs33[dname]</td><td bgcolor=$bg>$row[3]</td><td bgcolor=$bg>$row[5]</td><td bgcolor=$bg><a href=aundel.php?rno=".$row[0].">Undelete</a> | <a href=aundel.php?fno=".$row[0].">Final Delete</a></td></tr>";
                            $sno++;
                        }
                        if($sno==1)
                            echo "<tr><td align=center><font size=4 color=red>Records Not Found</font></td></tr>";
                        mysqli_close($conn);
                        ?>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html> 