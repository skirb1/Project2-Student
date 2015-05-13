<?php

include_once 'init.php';
include_once 'includes/overallheader.php';
include 'includes/widgets/logout.php';
if(array_key_exists('studentID', $_SESSION))
{
  $studentID = $_SESSION['studentID'];
?>
<h2>Are you sure you would like to drop your Appointment</h2>
<?php
include_once 'accept.php';
    if($_Post["Yes"])
    {
    echo "yes";
    }
/*
Search appointments for a student ID
return date/time/student info if appt exists
print info (include 'includes/printButton.php')
*/
    
    
}
include_once 'includes/overallfooter.php';
?>
