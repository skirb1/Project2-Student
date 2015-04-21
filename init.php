<?php
ob_start();
session_start();
require 'CommonMethods.php';

$debug = true;
$COMMON = new Common($debug);

require 'Student.php';
//require 'Calendar.php';
//$CALENDAR = new Calendar();

$errors = array();
?>