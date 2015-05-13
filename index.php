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
    if($student[6] == NULL)
    {
        //add appointment button, onclick -> SelectAppointment.php
        echo "<div id=\"appt\">You do not have an appointment</div>";
        echo "<div id=\"appt\"><br>";
        echo "<input type=\"button\" value=\"Make Appointment\" onclick=\"parent.location='searchAppts.php'\">";
        echo "</div>";
    
    }
    else{
        echo "<div id=\"appt\">";
        echo "<table id=\"transparentTable\">";
        //display current appointment info
        echo "<tr><td>Type:</td><td>".$student[8]." Advising</td></tr>";
        echo "<tr><td>Date:</td><td>".short_string($student[5])."</td></tr>";
        echo "<tr><td>Time:</td><td>".display_time($student[6])."</td></tr>";
        //get advisor info from ID
        $sql = "SELECT * FROM Advisors WHERE advisorID = '".$student[7]."'";
        $result = $COMMON->executeQuery($sql, $_SERVER["index.php"]);
        if(result !== false){
         $advisor = mysql_fetch_row($result);
            echo "<tr><td>Advisor:</td><td>".$advisor[1]." ".$advisor[2]."</td></tr>";
            echo "<tr><td>Advisor's Room:</td><td>".$advisor[4]."</td></tr>";
            echo "<tr><td>Advisor's Email:</td><td>".$advisor[3]."</td></tr>";
            echo "<tr><td>Advisor's Number:</td><td>".$advisor[5]."</td></tr>";
        }
        echo "</table></div>";
        include 'includes/printButton.php';
        
        //include 'includes/studentButtons.php';
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
    include 'studentIDForm.php';
}

include_once 'includes/overallfooter.php';
?>