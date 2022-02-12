<?php include(app_path() . '/includes/config/header.php'); ?>

<body>
  <div class="container-scroller">
    <?php include(app_path() . '/includes/config/navbar-owner.php'); ?>
    <div class="container-fluid page-body-wrapper">
      <?php include(app_path() . '/includes/config/sidebar-owner.php'); ?>
      <?php include(app_path() . '/includes/tables/table_inactive_member.php'); ?>
    </div>
  </div>
  <?php include(app_path() . '/includes/config/footer.php'); ?>
</body>

</html>