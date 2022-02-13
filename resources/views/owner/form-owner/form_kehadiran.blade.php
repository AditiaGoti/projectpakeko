<?php

session_start();

if (!isset($_SESSION['login_status'])) {
    header("location: \login");
    exit;
}
if (!$_SESSION['type'] == 2) {
    header("location: \login");
    exit;
}
?><?php include(app_path() . '/includes/config/header.php'); ?>

<body>
    <div class="container-scroller">
        <?php include(app_path() . '/includes/config/navbar-owner.php'); ?>
        <div class="container-fluid page-body-wrapper">
            <?php include(app_path() . '/includes/config/sidebar-owner.php'); ?>
            <?php include(app_path() . '/includes/forms/form_kehadiran.php'); ?>
        </div>
    </div>
    <?php include(app_path() . '/includes/config/footer.php'); ?>
</body>

</html>