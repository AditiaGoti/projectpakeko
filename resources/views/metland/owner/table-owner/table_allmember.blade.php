<?php

session_start();

if (!isset($_SESSION['login_status'])) {
  header("location: /Metland");
  exit;
}
if (!$_SESSION['type'] == 2) {
  header("location: /Metland");
  exit;
}
if (!$_SESSION['local'] == "Metland") {
  header("location: /Metland");
  exit;
}

?>
<?php include(app_path() . '/includes/cileungsi/config/header.php'); ?>

<body>
  <div class="container-scroller">
    <?php include(app_path() . '/includes/cileungsi/config/navbar-owner.php'); ?>
    <div class="container-fluid page-body-wrapper">
      <?php include(app_path() . '/includes/cileungsi/config/sidebar-owner.php'); ?>
      <?php include(app_path() . '/includes/cileungsi/tables/table_member.php'); ?>
    </div>
  </div>
  <?php include(app_path() . '/includes/cileungsi/config/footer.php'); ?>
  <!-- <script>
    $(document).ready(function() {
      $("#dataTables-member").DataTable({
        responsive: true,
      });
    });
  </script> -->
</body>

</html>