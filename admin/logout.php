
<?php 

    include("../config/constants.php");

// destroy the session and redirect to login page

    session_destroy();

    

    header("location:".$SITEURl);
    //.'admin/login.php'


?>