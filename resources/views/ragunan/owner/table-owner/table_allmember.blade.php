<?php

session_start();

if (!isset($_SESSION['login_status'])) {
  header("location: /Ragunan");
  exit;
}
if (!$_SESSION['type'] == 2) {
  header("location: /Ragunan");
  exit;
}
?>
<?php include(app_path() . '/includes/ragunan/config/header.php'); ?>

<body>
  <div class="container-scroller">
    <?php include(app_path() . '/includes/ragunan/config/navbar-owner.php'); ?>
    <div class="container-fluid page-body-wrapper">
      <?php include(app_path() . '/includes/ragunan/config/sidebar-owner.php'); ?>
      <?php include(app_path() . '/includes/ragunan/tables/table_member.php'); ?>
    </div>
  </div>
  <?php include(app_path() . '/includes/ragunan/config/footer.php'); ?>
  <!-- <script>
    $(document).ready(function() {
      $("#dataTables-member").DataTable({
        responsive: true,
      });
    });
  </script> -->
</body>

</html>