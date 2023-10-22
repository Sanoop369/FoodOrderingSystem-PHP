<?php 
    //Include constants.php for SITEURL
    include('config/constants.php');
    //1. Destory the Session
    session_destroy(); //Unsets $_SESSION['user']

    //2. REdirect to Login Page
    ?>
    <script>
    alert("LOGING OUT!");
    window.location.href="http://localhost/main%20project/login.php";
    </script>
    <?php

?>