<div class="main-panel">
    <div class="content-wrapper">
        <div class="row page-title-header">
            <div class="col-12">
                <div class="page-header" >
                    <h4 class="page-title" style="margin-top:10px;">Mengganti Password Member Klub Ade Rai</h4>
                </div>
            </div>
        </div>
        <div class="row" >
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form id="form_member" style="margin-top: 10px;" class="form sample">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Last Password</label>
                                        <input type="text" id="member_oldpass" class="form-control form-control-lg" placeholder="Masukan Alamat Member" aria-label="adress" required />
                                    </div>
                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input id="member_newpass" type="text" class="form-control form-control-lg" placeholder="Masukan Sandi Member" aria-label="password" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm New Password</label>
                                        <input id="member_cpass" type="text" class="form-control form-control-lg" placeholder="Masukan Sandi Member" aria-label="password" required />
                                    </div>
                                </div>
                            </div>
                        </form>
                        <button onclick="updatePassword()" type="submit" class="btn btn-success mr-3">
                            Submit
                        </button>
                        <button class="btn btn-danger">Cancel</button>
                        <script>
                            $("#btn").click(function() {
                                 $('<div class="alert alert-success">' +
                                '<button type="button" class="close" data-dismiss="alert">' +
                                '&times;</button>Data Berhasil Disimpan</div>').hide().prependTo('#change_pass').fadeIn(1000);
                                 $(".alert").delay(3000).fadeOut(
                                "normal",
                                function() {
                            $(this).remove();
                             });
                        });
                            var myalert = document.getElementById("alert");
                            var failalert = document.getElementById("alertfail");
                            var close = document.getElementsByClassName("close");
                            var i;
                            for (i = 0; i < close.length; i++) {
                                close[i].onclick = function() {
                                    var div = this.parentElement;
                                    div.style.opacity = "0";
                                    setTimeout(function() {
                                        div.style.display = "none";
                                    }, 600);
                                }
                            }

                            function updatePassword() {
                                var myArray = [];
                                var tokenSession = '<?php echo $_SESSION['token']; ?>';
                                var token = "Bearer" + " " + tokenSession;
                                var id = `<?php echo $_SESSION['id']; ?>`;
                                var form = document.getElementById("form_admin");
                                const url = "https://api.klubaderai.com/api/users" + "/" + id;
                                var myHeaders = new Headers();
                                myHeaders.append("Authorization", token);
                                myHeaders.append("Content-Type", "application/x-www-form-urlencoded");


                                var urlencoded = new URLSearchParams();
                                urlencoded.append(
                                    "curr_password",
                                    document.getElementById("member_oldpass").value
                                );
                                urlencoded.append(
                                    "password",
                                    document.getElementById("member_newpass").value
                                );

                                var requestOptions = {
                                    method: "PATCH",
                                    headers: myHeaders,
                                    body: urlencoded,
                                    redirect: "follow",
                                };
                                fetch(
                                        url,
                                        requestOptions
                                    )
                                    .then((response) => response.text())
                                    .then((result => {
                                        $('<div class="alert alert-success">' +
                                            '<button type="button" class="close" data-dismiss="alert">' +
                                            '&times;</button>Data Berhasil Disimpan</div>').hide().prependTo('#change_pass').fadeIn(1000);

                                        $(".alert").delay(3000).fadeOut(
                                            "normal",
                                            function() {
                                                $(this).remove();
                                            });
                                    }))
                                    .catch((error => {
                                        $('<div class="alert alert-danger">' +
                                            '<button type="button" class="close" data-dismiss="alert">' +
                                            '&times;</button>Terjadi Kesalahan</div>').hide().prependTo('#change_pass').fadeIn(1000);

                                        $(".alert").delay(3000).fadeOut(
                                            "normal",
                                            function() {
                                                $(this).remove();
                                            });
                                    }));
                            }
                        </script>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
    <footer class="footer">
        <div class="container-fluid clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright ©️ 2022. All Rights Reserved</span>
        </div>
    </footer>
    <!-- partial -->
</div>