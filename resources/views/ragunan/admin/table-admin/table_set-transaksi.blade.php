<?php

session_start();

if (!isset($_SESSION['login_status'])) {
  header("location: /Ragunan");
  exit;
}
if (!$_SESSION['type'] == 1) {
  header("location: /Ragunan");
  exit;
}
if (!$_SESSION['local'] == "Ragunan") {
  header("location: /Ragunan");
  exit;
}
?><?php include(app_path() . '/includes/ragunan/config/header.php'); ?>

<body>
  <div class="container-scroller">
    <?php include(app_path() . '/includes/ragunan/config/navbar.php'); ?>
    <div class="container-fluid page-body-wrapper">
      <?php include(app_path() . '/includes/ragunan/config/sidebar.php'); ?>
      <?php include(app_path() . '/includes/ragunan/tables/table_set-transaksi.php'); ?>
    </div>
  </div>
  <?php include(app_path() . '/includes/ragunan/config/footer.php'); ?>
</body>

</html>