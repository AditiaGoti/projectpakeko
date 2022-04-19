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
?><?php include(app_path() . '/ragunan/config/header.php'); ?>

<body>
    <div class="container-scroller">
        <div id="loading"> </div>
        <?php include(app_path() . '/ragunan/config/navbar.php'); ?>
        <div class="container-fluid page-body-wrapper">
            <?php include(app_path() . '/ragunan/config/sidebar.php'); ?>
            <?php include(app_path() . '/ragunan/forms/form_member.php'); ?>
        </div>
    </div>
    <?php include(app_path() . '/ragunan/config/footer.php'); ?>
</body>

</html>