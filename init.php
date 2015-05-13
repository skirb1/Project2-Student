<?php
ob_start();
session_start();
require 'CommonMethods.php';

$debug = true;
$COMMON = new Common($debug);

require 'calendar.php';
require 'Advisor.php';
require 'student.php';
require 'Group.php';
$CALENDAR = new calendar();

$errors = array();
?>