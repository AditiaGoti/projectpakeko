<?php

session_start();

if (!isset($_SESSION['login_status'])) {
    header("location: /Ragunan");
    exit;
}
if (!$_SESSION['type'] == 0) {
    header("location: /Ragunan");
    exit;
}
?>

<?php include(app_path() . '/includes/ragunan/config/header.php'); ?>

<body>
    <div class="container-scroller">
        <div id="loading"> </div>
        <?php include(app_path() . '/includes/ragunan/config/navside-member.php'); ?>
        <?php include(app_path() . '/includes/ragunan/config/profile-member.php'); ?>
    </div>
    </div>
    <?php include(app_path() . '/includes/ragunan/config/footer.php'); ?>
</body>

</html>