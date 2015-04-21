<?php

function name_from_studentID($studentID){
    global $debug;
    global $COMMON;
    $name = "";
    
    $sql = "SELECT * FROM Students WHERE studentID = '".$studentID."'";
    $record = $COMMON->executeQuery($sql, $_SERVER["Student.php"]);
    if($record !== false){
     $student = mysql_fetch_row($record);
        $name = $student[1]." ".$student[2];
    }
    
    return $name;
}

?>