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
?>

<?php include(app_path() . '/cileungsi/config/header.php'); ?>

<body>
    <div class="container-scroller">
        <?php include(app_path() . '/cileungsi/config/navside-member.php'); ?>
        <?php include(app_path() . '/cileungsi/config/newprofile.php'); ?>
    </div>
    </div>
    <?php include(app_path() . '/cileungsi/config/footer.php'); ?>
</body>

</html>