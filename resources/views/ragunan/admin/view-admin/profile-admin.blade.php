<?php

session_start();

if (!isset($_SESSION['login_status'])) {
    header("location: /ragunan");
    exit;
}
if (!$_SESSION['type'] == 1) {
    header("location: /ragunan");
    exit;
}
if (!$_SESSION['local'] == "ragunan") {
    header("location: /ragunan");
    exit;
}
?><?php include(app_path() . '/includes/ragunan/config/header.php'); ?>

<body>
    <div class="container-scroller">
        <div id="loading"> </div>
        <?php include(app_path() . '/includes/ragunan/config/navbar.php'); ?>
        <div class="container-fluid page-body-wrapper">
            <?php include(app_path() . '/includes/ragunan/config/sidebar.php'); ?>
            <?php include(app_path() . '/includes/ragunan/config/newprofile_admin.php'); ?>
        </div>
    </div>
    <?php include(app_path() . '/includes/ragunan/config/footer.php'); ?>
</body>

</html>