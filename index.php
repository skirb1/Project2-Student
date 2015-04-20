<?php
include_once 'init.php';
//include_once 'includes/overallheader.php';

if(array_key_exists('studentID', $_SESSION)){
    echo "<h2>Your Appointment</h2>";
    //display current appointment
    //display student menu (edit appt, cancel appt...)
}
else if(array_key_exists('student', $_POST)){
    //validate studentID here
    if(true){
        $_SESSION['studentID'] = $_POST['student'];
        header('Location: index.php');
    }
}
else {
    include 'StudentIDForm.php';
}

//include_once 'includes/overallfooter.php';
?>