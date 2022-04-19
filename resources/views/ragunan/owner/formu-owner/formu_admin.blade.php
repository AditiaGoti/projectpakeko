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
?><?php include(app_path() . '/ragunan/config/header.php'); ?>

<body>
    <div class="container-scroller">
        <div id="loading"> </div>
        <?php include(app_path() . '/ragunan/config/navbar-owner.php'); ?>
        <div class="container-fluid page-body-wrapper">
            <?php include(app_path() . '/ragunan/config/sidebar-owner.php'); ?>
            <?php include(app_path() . '/ragunan/forms-update/formu_admin.php'); ?>
        </div>
    </div>
    <?php include(app_path() . '/ragunan/config/footer.php'); ?>
</body>

</html>