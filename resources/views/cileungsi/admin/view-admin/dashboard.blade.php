<?php

session_start();

if (!isset($_SESSION['login_status'])) {
    header("location: /");
    exit;
}
if (!$_SESSION['type'] == 1) {
    header("location: /");
    exit;
}
?>
<?php include(app_path() . '/cileungsi/config/header.php'); ?>

<body>
    <div class="container-scroller">
        <?php include(app_path() . '/cileungsi/config/navbar.php'); ?>
        <div class="container-fluid page-body-wrapper">
            <?php include(app_path() . '/cileungsi/config/sidebar.php'); ?>
            <?php include(app_path() . '/cileungsi/config/dashboard.php'); ?>
        </div>
    </div>

    <?php include(app_path() . '/cileungsi/config/footer.php'); ?>
</body>