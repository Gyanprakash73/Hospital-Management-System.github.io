<?php
require('connection.php');
error_reporting(1);
?>
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
                <td ><font size=4 color=white>Patient Details Show</font></td>
            </tr>
            <?php
            $number=trim($_POST["number"]);
            $error=0;
            if ($number=="")
            {
                $error=1;
                echo "<tr><td><font color=red size=4>Name can't empty</font></td></tr>";
                echo "<form name=fdadd method=post action=pdetailsshow.php>";
                echo "<tr><td><table width=750 cellspacing=0 cellpadding=5>";
                echo "<tr><td>Patient Name</td><td><input type=text name=number size=30 maxlength=30 value='".$number."'></td></tr>";
                echo "</table></td></tr>";
                echo "<tr><td align=center><input type=submit value=Show></td></tr>";
                echo "</form>";
            }
            ?>
            <tr>
                <td>
                    <table width=750 cellspacing=5 cellpadding=15>
                        <tr bgcolor=blue>
                            <th align=center>S.No</th>
                            <th align=center>Patient Number</th>
                            <th align=center>Patient Name</th>
                            <th align=center>Address</th>
                            <th align=center>sex</th>
                        </tr>
                        <?php
                        $sno=1;
                        if($error==0)
                        {
                            $rs1=mysqli_query($conn,"SELECT * from patient where pno='$number';");
                            while($row=mysqli_fetch_array($rs1))
                            {
                                echo "<tr><td>$sno</td><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td></tr>";
                                $sno++;
                            }
                        }
                        if($sno==1)
                            echo "<tr><td align=center><font size=4 color=red>Record Not Found</font></td></tr>";
                        echo "<tr><td align=center><a href=../index.html>Continue...</a></td></tr>";
                        ?>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>