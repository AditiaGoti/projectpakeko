<?php

session_start();

if (!isset($_SESSION['login_status'])) {
    header("location: /metland");
    exit;
}
if (!$_SESSION['type'] == 0) {
    header("location: /metland");
    exit;
}
if (!$_SESSION['local'] == "metland") {
    header("location: /metland");
    exit;
}

?>

<?php include(app_path() . '/includes/metland/config/header.php'); ?>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="/assets/js/shared/qrcode.js"></script>

<body>
    <div class="container-scroller">
        <div id="loading"> </div>
        <?php include(app_path() . '/includes/metland/config/navside-member.php'); ?>
        <?php include(app_path() . '/includes/metland/config/dashboard-member.php'); ?>
    </div>
    </div>
    <?php include(app_path() . '/includes/metland/config/footer.php'); ?>
</body>

</html>