<?php

session_start();

if (!isset($_SESSION['login_status'])) {
    header("location: /");
    exit;
}
?>
<?php include(app_path() . '/cileungsi/config/header.php'); ?>
<?php include(app_path() . '/cileungsi/config/logout.php'); ?>
