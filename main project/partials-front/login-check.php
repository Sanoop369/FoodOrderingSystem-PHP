<?php 

    //AUthorization - Access COntrol
    //CHeck whether the user is logged in or not
    if(!isset($_SESSION['user'])) //IF user session is not set
    {
        //User is not logged in
        //REdirect to login page with message
        ?>
        <script>
        alert("PLEASE LOGIN TO CHEEESY!");
        window.location.href="http://localhost/main%20project/login.php";
        </script>
        <?php
    }

?>