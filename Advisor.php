<?php
//counts number of advisors stored in database
function count_advisors(){
    global $COMMON;
    $sql = "SELECT * FROM Advisors";
    $record = $COMMON->executeQuery($sql, $_SERVER["Advisor.php"]);  
    return mysql_num_rows($record);
}

function advisor_array(){
    global $COMMON;
    $arr = array();
    $sql = "SELECT * FROM Advisors";
    $record = $COMMON->executeQuery($sql, $_SERVER["Advisor.php"]);
    if(mysql_num_rows($record) >= 1){
        for($i=0; $i<mysql_num_rows($record); $i++){
             array_push($arr, mysql_result($record, $i, 'advisorID'));
        }
    }
    return $arr;
}

//returns full advisor name from advisorID
function name_from_advisorID($advisorID){
    global $debug;
    global $COMMON;
    $name = "";
    
    $sql = "SELECT * FROM Advisors WHERE advisorID = '".$advisorID."'";
    $record = $COMMON->executeQuery($sql, $_SERVER["Advisor.php"]);
    if($record !== false){
     $advisor = mysql_fetch_row($record);
        $name = $advisor[1]." ".$advisor[2];
    }
    return $name;
}

//Display list of advisors and contact info
function advisor_list(){
  global $debug;
  global $COMMON;
    $sql = "SELECT * FROM Advisors";
    $record = $COMMON->executeQuery($sql, $_SERVER["Advisor.php"]);
    echo "<div id=\"list\">";
    while($advisor = mysql_fetch_row($record))
      {
	echo $advisor[2] . " ";
	echo $advisor[3] . "<br>";
        echo $advisor[4] . "<br>";
        echo "Room " . $advisor[5] . "<br><br>";
      }
    echo "</div>";
}
?>