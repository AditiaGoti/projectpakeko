<?php

session_start();

if (!isset($_SESSION['login_status'])) {
    header("location: /ragunan");
    exit;
}
if (!$_SESSION['type'] == 2) {
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
        <?php include(app_path() . '/includes/ragunan/config/navbar-owner.php'); ?>
        <div class="container-fluid page-body-wrapper">
            <?php include(app_path() . '/includes/ragunan/config/sidebar-owner.php'); ?>
            <?php include(app_path() . '/includes/ragunan/forms/form_paket.php'); ?>
        </div>
    </div>
    <br>
    <?php include(app_path() . '/includes/ragunan/config/footer.php'); ?>
</body>

</html>