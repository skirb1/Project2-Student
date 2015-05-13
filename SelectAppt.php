<?php
    include_once 'init.php';
    include_once 'includes/overallheader.php';
    include 'includes/widgets/logout.php';

if(array_key_exists('studentID', $_SESSION)) {
    $studentID = $_SESSION['studentID'];

    if(count($_POST) > 1 && array_key_exists('type', $_POST)){
        $type = $_POST['type'];
        $dates = array();
        $times = array();
        $advisors = array();
        $validated = true;
        
        if(array_key_exists('dates', $_POST) && sizeof($_POST['dates']) > 0){
           $dates = $_POST['dates'];
        }
        else {
            echo "<br><div id=\"error\">";
            echo "<img src=\"includes/error.png\" id=\"errorImg\">";
            echo "Please select at least one date</div>";
            $validated = false;
        }
        
        if(array_key_exists('times', $_POST) && sizeof($_POST['times']) > 0){
           $times = $_POST['times'];
        }
        else {
            echo "<br><div id=\"error\">";
            echo "<img src=\"includes/error.png\" id=\"errorImg\">";
            echo "Please select at least one time</div>";
            $validated = false;
        }
        
        if($type == "indiv"){
            if(array_key_exists('advisors', $_POST) && 
               sizeof($_POST['advisors']) > 0){
               $advisors = $_POST['advisors'];
            }
            else {
                echo "<br><div id=\"error\">";
                echo "<img src=\"includes/error.png\" id=\"errorImg\">";
                echo "Please select at least one advisor for individual appointments</div>";
                $validated = false;
            }
        }
        
        //make individual appointment
        if($validated == true && $type == "indiv")
        {
            foreach($dates as $date)
            {
                foreach($advisors as $adv)
                {
                    $sql = "SELECT * FROM Individual_Schedule WHERE advisorID = '$adv' AND date='$date'";
                    $record = $COMMON->executeQuery($sql, $_SERVER["selectGroup.php"]);
        
                    if(mysql_num_rows($record) == 1)
                    {
                        echo "<div id=\"scheduleDisplay\">";
                        echo "<div id=\"dateTitle\">".name_from_advisorID($adv)." - ".date_to_string($date)."</div>";
                        echo "<table id=\"tableDisplay\"><tr>";
                        foreach($apptTimes as $time){
                           echo "<th>" . $time . "</th>";
                        }
                        echo "</tr><tr>";
                        
                        
                        foreach($apptTimes as $time)
                        {
                            $key = db_time($time);
                            $element = mysql_result($record, 0, $key);
                            if($element == "Open" || $element == major_from_studentID($studentID) ){
                                echo "<td>";
                                echo "<form id=\"apptForm\" action =\"makeAppt.php\" method=\"post\" >";
                                echo "<input type=\"hidden\" name=\"advisorID\" value=\"".$adv."\">";
                                echo "<input type=\"hidden\" name=\"date\" value=\"".$date."\">";
                                echo "<input type=\"hidden\" name=\"time\" value=\"".$time."\">";
                                echo "<input type=\"hidden\" name=\"type\" value=\"indiv\">";
                                echo "<input type=\"submit\" name=\"submit\" value=\"Select\">";
                                echo "</form></td>";
                            }
                            else if($element == "Closed" || $element == NULL || $element == "NULL" ){
	                           echo "<td id=\"tdUnavailable\">X</td>";
	                       } 
                            else if ( $element == "Group" ){
                                echo "<td><img src=\"includes/group-icon.png\"";
                                echo "style=\"width:34px;height:24px\"></td>";
                            }
                            else if ($element == "CMSC" || $element == "CMPE" ||
                                     $element == "ENGR" || $element == "ENCH" || $element == "ENME" ){
                                echo "<td>".$element."</td>";
	                       }
                            else {
                                echo "<td><img src=\"includes/student-icon.png\"";
                                echo "style=\"width:23px;height:22px\"></td>";            
                            }
    
                        }
                        echo "</tr></table></div>";
                    }
                    
                }
            }
            
            
                
        }
            
            
        
        //make group appointment
        else if($validated == true && $type == "group")
        {
            echo "successful group search";
            echo "<br>";
           /*  foreach($advisors as $adv)
            {
                   if(mysql_num_rows($record) < 1)
                   {
            $sql = "INSERT INTO Group_Schedule (date, time) VALUES ( '$date', '$time' );";
            $record = $COMMON->executeQuery($sql, $_SERVER["selectGroup.php"]);
            if($record == false)
            {
                echo "<div id=\"error\"><img src=\"includes/error.png\" id=\"errorImg\">";
                echo "Error adding new group time.</div>";
            }
            }
            
            */
            
            
        }
              
        else if ($validated == false ){
            echo "<div id=\"error\"><a href=\"searchAppts.php\">Back</a></div>";
        }
        
    }
    else {
        echo "<br><div id=\"error\"><img src=\"includes/error.png\" id=\"errorImg\">";
        echo "Please select an appointment type</div>";
        echo "<div id=\"error\"><a href=\"searchAppts.php\">Back</a></div>";
}
}
else {
    echo "<br><div id=\"error\"><img src=\"includes/error.png\" id=\"errorImg\">";
    echo "You are not logged in.</div>";
}

include_once 'includes/overallfooter.php';
?>