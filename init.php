<?php
ob_start();
session_start();
require 'CommonMethods.php';

$debug = true;
$COMMON = new Common($debug);

require 'Advisor.php';
require 'student.php';
require 'calendar.php';
$CALENDAR = new calendar();

$errors = array();
?>