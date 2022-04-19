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
?><?php include(app_path() . '/cileungsi/config/header.php'); ?>

<body>
    <div class="container-scroller">
        <div id="loading"> </div>
        <?php include(app_path() . '/cileungsi/config/navbar-owner.php'); ?>
        <div class="container-fluid page-body-wrapper">
            <?php include(app_path() . '/cileungsi/config/sidebar-owner.php'); ?>
            <?php include(app_path() . '/cileungsi/forms-update/formu_member.php'); ?>
        </div>
    </div>
    <?php include(app_path() . '/cileungsi/config/footer.php'); ?>
</body>

</html>