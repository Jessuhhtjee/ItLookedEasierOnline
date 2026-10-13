<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login-register.php");
    exit;
}



include 'includes/config.php';
include 'views/profile_view.php';

?>
