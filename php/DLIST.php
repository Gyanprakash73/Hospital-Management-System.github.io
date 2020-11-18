<?php
require('connection.php');
?>
<html>
    <head>
        <title>All Doctors List</title>
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
                <td ><font size=4 color=white>Doctors List</font></td>
            </tr>
            <tr>
                <td><a href=dadd.php>Add New Doctor</a></td>
            </tr>
            <tr>
                <td>
                    <table width=750 cellspacing=0 cellpadding=5 border=1>
                        <tr bgcolor=blue>
                            <th align=center>S No</th>
                            <th align=center>Doctor Id</th>
                            <th align=center>Doctor Name</th>
                            <th align=center>Specialization</th>
                            <th align=center>Options</th>
                        </tr>
                        <?php
                        $que="select *from doct where dshow='Y' order by dno";
                        $rs1=mysqli_query($conn,$que);
                        $sno=1;
                        $c=0;
                        while( $row=mysqli_fetch_array($rs1))
                        {
                            $c=$c+1;
                            if($c%2==0)
                                $bg='#dedede';
                            else
                                $bg='#fff';
                            echo "<tr><td bgcolor=$bg>$sno</td><td bgcolor=$bg align=center>$row[0]</td><td bgcolor=$bg>$row[1]</td><td bgcolor=$bg>$row[2]</td><td bgcolor=$bg><a href=dmod.php?rno=".$row[0].">Modify</a> | <a href=ddel.php?rno=".$row[0].">Delete</a></td></tr>";
                            $sno++;
                        }
                        if ($sno==1) 
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
                    <table width=750 cellspacing=0 cellpadding=5 border=1>
                        <tr bgcolor=blue>
                            <th align=center>S No</th>
                            <th align=center>Doctor Id</th>
                            <th align=center>Doctor Name</th>
                            <th align=center>Specialization</th>
                            <th align=center>Options</th>
                        </tr>
                        <?php
                        $rs2=mysqli_query($conn,"SELECT * from doct where dshow='N' order by dno;");
                        $sno=1;
                        $c=0;
                        while( $row=mysqli_fetch_array($rs2))
                        {
                            $c=$c+1;
                            if($c%2==0)
                                $bg='#dedede';
                            else
                                $bg='#fff';
                            echo "<tr><td bgcolor=$bg>$sno</td><td bgcolor=$bg align=center>$row[0]</td><td bgcolor=$bg>$row[1]</td><td bgcolor=$bg>$row[2]</td><td bgcolor=$bg><a href=dundel.php?rno=".$row[0].">Undelete</a> | <a href=ddel.php?fno=".$row[0]."> Final Delete</a></td></tr>";
                            $sno++;
                        }
                        if($sno==1) echo "<tr><td align=center><font size=4 color=red>Records Not Found</font></td></tr>";
                        ?>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html> 