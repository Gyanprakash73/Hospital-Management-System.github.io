<?php
require('connection.php');
?>
<html>
    <head>
        <title>Add New Doctor</title>
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
                <td ><font size=4 color=white>New Doctor</font></td>
            </tr>
            <form name=fdadd method=post action=dsave.php>
                <tr>
                    <td>
                        <table width=750 cellspacing=0 cellpadding=5>
                            <tr>
                                <td>Doctor Name</td>
                                <td><input type=text name=name size=30 maxlength=30></td>
                            </tr>
                            <tr>
                                <td>Specilization</td>
                                <td><input type=text name=spec size=30 maxlength=30></td>
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