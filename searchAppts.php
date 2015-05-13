<?php
include_once 'init.php';
include_once 'includes/overallheader.php';
include 'includes/widgets/logout.php';
if(array_key_exists('studentID', $_SESSION))
{
  $advisorID = $_SESSION['studentID'];
?>
<h2>Search Available Appointments</h2>
<form id="weekForm" action="searchAppts.php" method="post">
<?php include 'includes/selectWeek.php'; ?>
</form>
<script language="JavaScript">
function toggle(source, name) {
  checkboxes = document.getElementsByName(name);
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }
}
</script>
<?php
  if(count($_POST) > 1){
      //form to select search criteria
?>
    <form action="selectAppt.php" method="post"><br>
    <table id="outerTable"><tr>

    <td><div id="selectTitle">Select dates:</div>
    <div id="selectGroup"><table id="transparentTable">
<?php
    $week = $CALENDAR->weeks[(int)$_POST['week']];
    for($i = 0; $i < 5; $i++){
      $date = $week->dates[$i];
      echo "<tr><td><input type=\"checkbox\" name=\"dates[]\" value=\"".$date."\" checked>";
      echo date_to_string($date)."</td>";
      echo "</tr>";
    }
        ?><tr><td><input type="checkbox" onClick="toggle(this, 'dates[]')" checked/><b>Select All</b></td></tr></table></div></td>
      
    <td><div id="selectTitle">Select times:</div>
    <div id="selectGroup"><table id="transparentTable">
<?php
    foreach($apptTimes as $time){
      echo "<tr><td><input type=\"checkbox\" name=\"times[]\" value=\"".db_time($time)."\" checked>";
      echo display_time($time)."</td>";
      echo "</tr>";
    }
?>
        <tr><td><input type="checkbox" onClick="toggle(this, 'times[]')" checked/><b>Select All</b></td></tr></table></div></td>
      
    <td><div id="selectTitle">Appointment Type:</div>
    <div id="selectGroup"><table id="transparentTable">
    <tr><td><input type="radio" name="type" value="indiv" required>Individual
    </td></tr>
    <tr><td><input type="radio" name="type" value="group" required>Group
    </td></tr>
    </table></div>
        
    <br><div id="selectTitle">Select Advisor (individual only):</div>
    <div id="selectGroup">
    <table id="transparentTable">
<?php
     //select advisors
    $advisorArr = advisor_array();
    foreach($advisorArr as $adv){
      echo "<tr><td><input type=\"checkbox\" name=\"advisors[]\" value=\"".$adv;
        echo "\" checked>".name_from_advisorID($adv);
      echo "</td></tr>";
    }
?>
    <tr><td>
        <input type="checkbox" onClick="toggle(this, 'advisors[]')" checked/><b>Select All</b></td></tr>
    </table></div>
    </td>

    <td>
        <div id="submit"><input type="submit" name="search" value="Search">
        </div>
    </td>
    </tr></table></form>
<?php
}
}
else {
    echo "<br><div id=\"error\"><img src=\"includes/error.png\" id=\"errorImg\">";
    echo "You are not logged in.</div>";
}

include_once 'includes/overallfooter.php';
?>