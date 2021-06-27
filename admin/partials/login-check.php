<?php 
    //check whether user is logged in or not
    //authorization or access control
    if(!isset($_SESSION['user'])) // if user is not set
    {
        $_SESSION['no-login-message'] = "<div class='error text-center'>Please Login to Acces Admin Panel</div>";
        header('location:'.SITEURL.'admin/login.php');
    }
?>