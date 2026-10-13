<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}



include 'includes/config.php';
include 'views/profile_view.php';

?>
