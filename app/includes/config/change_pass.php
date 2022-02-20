<div class="main-panel">
    <div class="content-wrapper">
        <div class="row page-title-header">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title" style="margin-top:10px;">Mengganti PasswordKlub Ade Rai</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form id="form_member" onsubmit="updatePassword(); return false" style="margin-top: 10px;" class="form sample">
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
                            <button type="submit" class="btn btn-inverse-success btn-fw">
                                Submit
                            </button>
                            <button type="button" onclick="window.location.href='/'" class="btn btn-inverse-dark btn-fw">Cancel</button>
                        </form>

                        <script>
                            function updatePassword() {
                                var myArray = [];
                                var tokenSession = '<?php echo $_SESSION['token']; ?>';
                                var token = "Bearer" + " " + tokenSession;

                                var id = `<?php echo $_SESSION['id']; ?>`;
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
                                        "https://api.klubaderai.com/api/users" + "/" + id, requestOptions
                                    )
                                    .then((response) => response.text())
                                    .then((result => {
                                        $('<div class="alert alert-success">' +
                                            '<button type="button" class="close" data-dismiss="alert">' +
                                            '&times;</button>Data Berhasil Disimpan</div>').hide().prependTo('#form_changepass').fadeIn(1000);

                                        $(".alert").delay(3000).fadeOut(
                                            "normal",
                                            function() {
                                                $(this).remove();
                                            });
                                    }))
                                    .catch((error => {
                                        $('<div class="alert alert-danger">' +
                                            '<button type="button" class="close" data-dismiss="alert">' +
                                            '&times;</button>Terjadi Kesalahan</div>').hide().prependTo('#form_changepass').fadeIn(1000);

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