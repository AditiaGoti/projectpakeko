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

if (!$_SESSION['local'] == "Ragunan") {
    header("location: /Ragunan");
    exit;
}
?>

<?php include(app_path() . '/includes/ragunan/config/header.php'); ?>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="../../../../public/assets/js/shared/qrcode.js"></script>

<body>
    <div class="container-scroller">
        <?php include(app_path() . '/includes/ragunan/config/navside-member.php'); ?>
        <?php include(app_path() . '/includes/ragunan/config/dashboard-member.php'); ?>
    </div>
    </div>
    <?php include(app_path() . '/includes/ragunan/config/footer.php'); ?>
</body>

</html>