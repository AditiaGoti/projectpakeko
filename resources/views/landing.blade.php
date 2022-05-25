<?php
session_start();

if (isset($_SESSION['login_status'])) {
    if ($_SESSION['local'] == "Ragunan") {
        header('location: /Ragunan');
    } else if ($_SESSION['local'] == "Metland") {
        header('location: /Metland');
    }
}

?>
<?php include(app_path() . '/includes/landing.php'); ?>