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
        <title>HOSPITAL MANAGEMENT SYSTEM</title>
        <link rel="stylesheet" href="css/bootstrap.css"/>
    </head> 
    <body>
        <table class="table table-bordered">
            <tr bgcolor=blue>
                <td align=center><font SIZE=6 color=white>HOSPITAL MANAGEMENT SYSTEM</font></td>
            </tr>
            <tr bgcolor=red>
				<td ><font size=4 color=white>Add Appointments</font></td>
			</tr>
			<form name=fdadd method=post action=abooksave.php>
				<tr>
					<td>
						<table width=750 cellspacing=0 cellpadding=5>
							<tr>
								<td>Patient Id & Name</td>
								<td>
									<select name=pat style="width:230px">
										<?php
										$rs1=mysqli_query($conn,"SELECT * from patient where pshow='Y' order by pno;");
										$sno=1;
										?>
										<option selected="selected" disabled="disabled">Patient Id & Name</option>
										<?php
										while( $row=mysqli_fetch_array($rs1))
										{
 											$patient_id=$row[0];
 											$patient=$row[1];
 										?>
										<option value="<?php echo $patient_id ?>"><?php echo $patient_id."  :  ".$patient ?></option>
 										<?php
 										$sno++;
										}
										?>
									</select>
								</td>
							</tr>
							<tr>
								<td>Doctor Id & Name</td>
								<td>
									<select name=doc style="width:230px">
										<option selected="selected" disabled="disabled">Doctor Id & Name</option>
										<?php
										$rs2=mysqli_query($conn,"SELECT * from doct where dshow='Y' order by dno;");
										$sno=1;
										while($row1=mysqli_fetch_array($rs2))
										{									
 											$doctor_id=$row1[0];
											$doctor=$row1[1];
 										?>
										<option value="<?php echo $doctor_id ?>"><?php echo $doctor_id."  :  ".$doctor ?></option>
 										<?php
										 $sno++;
										}
										?>
									</select>
								</td>
							</tr>
							<tr>
								<td>Time</td>
								<td><input type=Time name=tim placeholder="HH:MM" size=30 maxlength=30></td>
							</tr>
							<tr>
								<td>Date</td>
								<td><input type=Date name=dat placeholder="DD/MM/YYYY" size=30 maxlength=30></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
                    <td align=center><input type="submit" value="Submit"></td>
				</tr>
			</form>
        </table>
    </body>
</html>