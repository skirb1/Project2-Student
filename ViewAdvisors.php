<?php
include 'init.php';
include 'includes/overallheader.php';

echo "<h2>Advisors</h2>";

$sql = "SELECT * FROM Advisors";
$record = $COMMON->executeQuery($sql, $_SERVER["Advisor.php"]);
echo "<div id=\"list\">";
while($advisor = mysql_fetch_row($record)){
	echo $advisor[1] . " " . $advisor[2];
	echo "<br>".$advisor[3];
    echo "<br>";
    echo "Room " . $advisor[4] . "<br><br>";
}
echo "</div>";

include 'includes/overallfooter.php';
?>