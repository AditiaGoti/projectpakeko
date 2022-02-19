<?php

session_start();

if (!isset($_SESSION['login_status'])) {
    header("location: /");
    exit;
}
?>
<?php include(app_path() . '/includes/config/header.php'); ?>
<?php include(app_path() . '/includes/config/logout.php'); ?>
