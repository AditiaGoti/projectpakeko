<?php include(app_path() . '/includes/config/header.php'); ?>

<body>
  <div class="container-scroller">
    <?php include(app_path() . '/includes/config/navbar.php'); ?>
    <div class="container-fluid page-body-wrapper">
      <?php include(app_path() . '/includes/config/sidebar.php'); ?>
      <?php include(app_path() . '/includes/charts/chart_reports.php'); ?>
    </div>
  </div>

  <?php include(app_path() . '/includes/config/footer.php'); ?>
  <script type="text/javascript" src="assets/js/shared/chart.js"></script>
</body>