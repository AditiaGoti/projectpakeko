<?php

session_start();

if (!isset($_SESSION['login_status'])) {
    header("location: /Metland");
    exit;
}
if (!$_SESSION['type'] == 1) {
    header("location: /Metland");
    exit;
}
if (!$_SESSION['local'] == "Metland") {
    header("location: /Metland");
    exit;
}

?><?php include(app_path() . '/includes/cileungsi/config/header.php'); ?>

<body>
    <div class="container-scroller">
        <div id="loading"> </div>
        <?php include(app_path() . '/includes/cileungsi/config/navbar.php'); ?>
        <div class="container-fluid page-body-wrapper">
            <?php include(app_path() . '/includes/cileungsi/config/sidebar.php'); ?>
            <?php include(app_path() . '/includes/cileungsi/forms/form_transaksi.php'); ?>
        </div>
    </div>
    <?php include(app_path() . '/includes/cileungsi/config/footer.php'); ?>
</body>

</html>