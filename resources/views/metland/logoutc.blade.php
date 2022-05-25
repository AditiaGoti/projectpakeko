<?php

session_start();

if (!isset($_SESSION['login_status'])) {
    header("location: /metland");
    exit;
}
?>
<?php include(app_path() . '/includes/metland/config/header.php'); ?>
<div class="wrap">
    <div class="loading">
        <div class="bounceball"></div>
        <div class="text">NOW LOADING</div>
    </div>
</div>
<script>
    var tokenSession = '<?php echo $_SESSION['token']; ?>';
    var token = "Bearer" + " " + tokenSession;

    var settings = {
        "url": "https://api.tms-klar.com/api/logout",
        "method": "POST",
        "timeout": 0,
        "headers": {
            "Authorization": token
        },
    };

    $.ajax(settings).done(function(response) {
        '<?php session_destroy() ?>';
    });

    function refresh() {
        window.location.reload();
    }
    refresh();
    // }
    // });
</script>