<?php
require('connection.php');
?>

<html>
  <head>
    <title>Add Appointments</title>
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
        <td ><font size=4 color=white>Booked Appointment</font></td>
      </tr>

      <?php
      $pat=trim($_POST["pat"]);
      $doc=trim($_POST["doc"]);
      $tim=trim($_POST["tim"]);
      $dat=trim($_POST["dat"]);
      $error=0;
      if($pat=="")
      {
        $error=1;
        echo "<tr><td><font color=red size=4>Patient's Name can't empty</font></td></tr>";
      }
      if($doc=="")
      {
        $error=1;
        echo "<tr><td><font color=red size=4>doctor Id can't empty</font></td></tr>";
      }
      if($tim=="")
      {
        $error=1;
        echo "<tr><td><font color=red size=4>Time can't empty</font></td></tr>";
      }
      if($dat=="")
      {
        $error=1;
        echo "<tr><td><font color=red size=4>Date can't empty</font></td></tr>";
      }
      if($error==0)
      {
        mysqli_query($conn,"insert into appt(adoctor,apatient,atime,adate,ashow) values('".$doc."','".$pat."','".$tim."','".$dat."','Y')");
        echo "<tr><td align=center><font size=4 color=green>Successfully Appointment Book</font></td></tr>";
      }
      else
      {
        echo "<form name=fdadd method=post action=asave.php>";
        echo "<tr><td><table width=750 cellspacing=0 cellpadding=5>";
          echo "<tr><td>Patient Id & Name</td><td><select name=pat style='width:230px'>";
		      $rs1=mysqli_query($conn,"SELECT * from patient where pshow='Y' order by pno");
		      $sno=1;
		      echo "<option selected='selected' disabled='disabled'>Patient Id & Name</option>";
		      while($row=mysqli_fetch_array($rs1)) { $patient_id=$row[0]; $patient=$row[1];
		      echo "<option value='$patient_id'>$patient_id : $patient </option>";
 		      $sno++;}
          echo "</select></td></tr>";

          echo "<tr><td>Doctor Id & Nmae</td><td><select name=doc style='width:230px'>";
		      $rs2=mysqli_query($conn,"SELECT * from doct where dshow='Y' order by dno;");
			    $sno=1;
		      echo "<option selected='selected' disabled='disabled'>Doctor Id & Name</option>";
		      while($row1=mysqli_fetch_array($rs2)) { $doctor_id=$row1[0]; $doctor=$row1[1];
		      echo "<option value='$doctor_id'>$doctor_id : $doctor </option>";
 		      $sno++;}
          echo "</select></td></tr>";

          echo "<tr><td>Time</td><td><input type=Time name=tim size=30 maxlength=30 value='".$tim."'></td></tr>";
          echo "<tr><td>Date</td><td><input type=Date name=dat size=30 maxlength=30 value='".$dat."'></td></tr>";
        echo "</table></td></tr>";
        echo "<tr><td align=center><input type=submit value=Submit></td></tr>";
        echo "</form>";
      }
      ?>
      <tr>
        <td align=center><a href=alist.php>Continue...</a></td>
      </tr>
    </table>
  </body>
</html>