<!doctype html>
<html>
    <head>
        <title>COEITAdvising</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="includes/style.css">
    </head>
<body>
<header>
<h1 id="logo">COEIT Advising</h1>
<nav><ul id="menu" >
<li><a href="index.php">Home</a></li>
    <?php
    if(array_key_exists('studentID', $_SESSION)){
        //include 'includes/studentMenu.php'; 
    }
    ?>
</ul></nav>
</header>
<div id="center">