<?php
include_once 'init.php';
include_once 'includes/overallheader.php';

if(array_key_exists('studentID', $_SESSION)){
    include 'includes/widgets/logout.php';
    echo "<h2>Your Appointment</h2>";
    
    //display current appointment if it exists
    $sql = "SELECT * FROM Students WHERE studentID = '".$_SESSION['studentID']."'";
    $result = $COMMON->executeQuery($sql, $_SERVER["index.php"]);
    $student = mysql_fetch_row($result);
    if($student[6] == NULL){
     echo "You do not have an appointment";
        //add appointment button, onclick -> SelectAppointment.php
    }
    else{
        //display current appointment info
        echo "Type: ".$student[8]." Advising";
        echo "<br>Date: ".$student[5];
        echo "<br>Time: ".$student[6];
        //get advisor info from ID
        $sql = "SELECT * FROM Advisors WHERE advisorID = '".$student[7]."'";
        $result = $COMMON->executeQuery($sql, $_SERVER["index.php"]);
        if(result !== false){
         $advisor = mysql_fetch_row($result);
            echo "<br>Advisor: ".$advisor[1]." ".$advisor[2];
            echo "<br>Room: ".$advisor[5];
        }
        
        include 'includes/studentButtons.php';
        //cancel appoinment button, are you sure?
        //onclick -> delete appt, refresh index.php
    }

}
else if(array_key_exists('student', $_POST)){
    //validate studentID here, use sanitize(ID)
    if(true){
        $_SESSION['studentID'] = $_POST['student'];
        header('Location: index.php');
    }
}
else {
    include 'StudentIDForm.php';
}

include_once 'includes/overallfooter.php';
?>