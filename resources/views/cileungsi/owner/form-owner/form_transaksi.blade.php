<?php

session_start();

if (!isset($_SESSION['login_status'])) {
    header("location: /");
    exit;
}
if (!$_SESSION['type'] == 2) {
    header("location: /");
    exit;
}
?><?php include(app_path() . '/includes/cileungsi/config/header.php'); ?>

<body>
    <div class="container-scroller">
        <div id="loading"> </div>
        <?php include(app_path() . '/includes/cileungsi/config/navbar-owner.php'); ?>
        <div class="container-fluid page-body-wrapper">
            <?php include(app_path() . '/includes/cileungsi/config/sidebar-owner.php'); ?>
            <?php include(app_path() . '/includes/cileungsi/forms/form_transaksi.php'); ?>
        </div>
    </div>
    <?php include(app_path() . '/includes/cileungsi/config/footer.php'); ?>
</body>

</html>