<aside>
<div class="widget">
<p>Logged in as 
<?php
   if(array_key_exists('studentID', $_SESSION))
   {
     echo " ".name_from_studentID($_SESSION['studentID']);
   }
  
?>
</p>
  <div class="inner">
  <input type="button" value="Log Out" onclick="parent.location='logout.php'">
  </div>
</div>
</aside>