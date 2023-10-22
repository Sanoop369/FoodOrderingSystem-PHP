
<?php 
//start session
session_start();
define('SITEURL','http://localhost/main%20project/');
$con=mysqli_connect('localhost','root','') or die("failed");
     $db_select=mysqli_select_db($con,'hotel') or die("failed");
     ?>