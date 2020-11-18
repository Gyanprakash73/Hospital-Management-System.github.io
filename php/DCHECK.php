<?php
require('connection.php');
error_reporting(1);
?>
<html>
    <head>
        <title>Doctor Check</title>
        <link rel="stylesheet" href="css/bootstrap.css"/>
    </head> 
    <body>
        <table class="table table-bordered">
            <tr bgcolor=blue>
                <td align=center><font SIZE=6 color=white>HOSPITAL MANAGEMENT SYSTEM</font></td>
            </tr>
            <tr bgcolor=red>
                <td ><font size=4 color=white>Doctor Check To Patient Appointment</font></td>
            </tr>
            <?php
            $id=trim($_POST["id"]);
            $error=0;
            if ($id=="")
            {
                $error=1;
                echo "<tr><td><font color=red size=4>Doctor Id can't empty</font></td></tr>";
                echo "<form name=fdadd method=post action=dcheck.php>";
                echo "<tr><td><table width=750 cellspacing=0 cellpadding=5>";
                echo "<tr><td>Doctor Id</td><td><input type=text name=id size=30 maxlength=30 value='".$id."'></td></tr>";
                echo "</table></td></tr>";
                echo "<tr><td align=center><input type=submit value=Login></td></tr>";
                echo "</form>";
            }
            $d1=mysqli_query($conn,"SELECT dname from doct where dshow='Y' AND dno=$id");
            $d11=mysqli_fetch_assoc($d1);
            echo "<tr><td align=center> $d11[dname]</td></tr>";
            ?>
            <tr>
                <td>
                    <table width=1150 cellspacing=0 cellpadding=5 border=1>
                        <tr bgcolor=blue>
                            <th align=center>S No</th>
                            <th align=center>Patient Number</th>
                            <th align=center>Patient Name</th>
                            <th align=center>Patient Address</th>
                            <th align=center>Sex</th>
                            <th align=center>Time</th>
                            <th align=center>Date</th>
                            <th align=center>Options</th>
                        </tr>
                        <?php
                        $sno=1;
                        $c=0;
                        if($error==0)
                        {
                            $rs2=mysqli_query($conn,"SELECT * from appt where ashow='Y' And adoctor=$id");
                            while($row=mysqli_fetch_array($rs2))
                            {
                                $p1=mysqli_query($conn,"SELECT pno,pname,paddr,psex from patient where pshow='Y' AND pno='$row[2]'");
                                $p11=mysqli_fetch_assoc($p1);
                                $c=$c+1;
                                if($c%2==0)
                                    $bg='#dedede';
                                else
                                    $bg='#fff';
                                echo "<tr><td bgcolor=$bg>$sno</td><td bgcolor=$bg>$p11[pno]</td><td bgcolor=$bg>$p11[pname]</td><td bgcolor=$bg>$p11[paddr]</td><td bgcolor=$bg>$p11[psex]</td><td bgcolor=$bg>$row[3]</td><td bgcolor=$bg>$row[5]</td><td bgcolor=$bg><a href=dchecked.php?rno=".$row[3].">Check</a></td></tr>";
                                $sno++;
                            }
                        }
                        if($sno==1)
                            echo "<tr><td align=center><font size=4 color=red>Record Not Found</font></td></tr>";
                        ?>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>