<?php

function name_from_studentID($studentID)
{
    global $debug;
    global $COMMON;
    $name = "";
    
    $sql = "SELECT * FROM Students WHERE studentID = '".$studentID."'";
    $record = $COMMON->executeQuery($sql, $_SERVER["Student.php"]);
    if($record !== false)
    {
     $student = mysql_fetch_row($record);
        $name = $student[1]." ".$student[2];
    }
    
    return $name;
}

function major_from_studentID($studentID){
    global $debug;
    global $COMMON;
    $major = "";
    
    $sql = "SELECT * FROM Students WHERE studentID = '".$studentID."'";
    $record = $COMMON->executeQuery($sql, $_SERVER["Student.php"]);
    if(mysql_num_rows($record) == 1)
    {
        $major = mysql_result($record, 0, 'major');
    }
    return $major;
}


?>