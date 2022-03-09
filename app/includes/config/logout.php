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
        "url": "https://api.klubaderai.com/api/logout",
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