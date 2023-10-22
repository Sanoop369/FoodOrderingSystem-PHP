<?php 

 
$con=mysqli_connect('localhost','root','') or die("failed");
     $db_select=mysqli_select_db($con,'hotel') or die("failed");
     
    //AUthorization - Access COntrol
    //CHeck whether the user is logged in or not
    if(!isset($_SESSION['user1'])) //IF user session is not set
    {
        //User is not logged in
        //REdirect to login page with message
        ?>
        <script>
        alert("PLEASE LOGIN TO ADMIN!");
        window.location.href="http://localhost/main%20project/admin/login.php";
        </script>
        <?php
    }

?>