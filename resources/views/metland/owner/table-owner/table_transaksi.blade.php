<?php

session_start();

if (!isset($_SESSION['login_status'])) {
  header("location: /metland");
  exit;
}
if (!$_SESSION['type'] == 2) {
  header("location: /metland");
  exit;
}
if (!$_SESSION['local'] == "metland") {
  header("location: /metland");
  exit;
}

?><?php include(app_path() . '/includes/metland/config/header.php'); ?>

<body>
  <div class="container-scroller">
    <div id="loading"> </div>
    <?php include(app_path() . '/includes/metland/config/navbar-owner.php'); ?>
    <div class="container-fluid page-body-wrapper">
      <?php include(app_path() . '/includes/metland/config/sidebar-owner.php'); ?>
      <?php include(app_path() . '/includes/metland/tables/table_transaksi.php'); ?>
    </div>
  </div>
  <?php include(app_path() . '/includes/metland/config/footer.php'); ?>
</body>

</html>