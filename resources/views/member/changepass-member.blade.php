<?php

session_start();

if (!isset($_SESSION['login_status'])) {
    header("location: /");
    exit;
}
if (!$_SESSION['type'] == 0) {
    header("location: /");
    exit;
}
?><?php include(app_path() . '/includes/config/header.php'); ?>

<body>
    <div class="container-scroller">
        <?php include(app_path() . '/includes/config/navbar.php'); ?>
        <div class="container-fluid page-body-wrapper">
            <?php include(app_path() . '/includes/config/sidebar.php'); ?>
            <?php include(app_path() . '/includes/config/change_pass.php'); ?>
        </div>
    </div>
    <?php include(app_path() . '/includes/config/footer.php'); ?>
</body>

</html>