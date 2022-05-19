<div class="main-panel">
    <div class="content-wrapper">
        <div class="row page-title-header">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title" style="margin-top:10px;">Mengganti Password Klub Ade Rai</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form id="form_changepass" onsubmit="updatePassword(); return false" style="margin-top: 10px;" class="form sample">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Last Password</label>
                                        <input type="password" id="member_oldpass" class="form-control form-control-lg" placeholder="Masukan Password Lama" aria-label="adress" required />
                                    </div>
                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input id="member_newpass" type="password" class="form-control form-control-lg" placeholder="Masukan Password Baru" aria-label="password" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm New Password</label>
                                        <input id="member_cpass" type="password" class="form-control form-control-lg" placeholder="Masukan Password Konfirmasi" aria-label="password" required />
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-inverse-success btn-lg btn-block ">
                                Submit
                            </button>
                            <button type="button" onclick="window.location.href='/'" class="btn btn-inverse-dark btn-lg btn-block ">Cancel</button>
                        </form>

                        <script>
                            var myArray = [];
                            var tokenSession = '<?php echo $_SESSION['token']; ?>';
                            var token = "Bearer" + " " + tokenSession;
                            var id = `<?php echo $_SESSION['id']; ?>`;
                            var type = `<?php echo $_SESSION['type']; ?>`;
                            const url = "https://ragunan.tms-klar.com/api/users/changepass" + "/" + id;

                            const loader = document.querySelector("#loading");

                            function displayLoading() {
                                loader.classList.add("loading");
                                setTimeout(() => {
                                    loader.classList.remove("loading");
                                }, 8000);
                            }

                            function hideLoading() {
                                loader.classList.remove("loading");
                            }

                            function updatePassword() {
                                displayLoading()
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
                                urlencoded.append(
                                    "password_confirmation",
                                    document.getElementById("member_cpass").value
                                );

                                var requestOptions = {
                                    method: "PATCH",
                                    headers: myHeaders,
                                    body: urlencoded,
                                    redirect: "follow",
                                };
                                fetch(
                                        url, requestOptions
                                    )
                                    .then((response) => response.text())
                                    .then((result => {
                                        hideLoading()
                                        var data = JSON.parse(result);
                                        var hasildata = data.success;
                                        var message = data.message;

                                        if (hasildata) {
                                            $('<div class="alert alert-success">' +
                                                '<button type="button" class="close" data-dismiss="alert">' +
                                                '&times;</button>Data Berhasil Disimpan</div>').hide().prependTo('#form_changepass').fadeIn(1000);

                                            $(".alert").delay(3000).fadeOut(
                                                "normal",
                                                function() {
                                                    $(this).remove();
                                                });
                                            document.getElementById("form_changepass").reset();
                                            if (type == 1) {
                                                location.href = "/ragunan/profile-admin";
                                            } else if (type == 0)
                                                location.href = "/ragunan/profile-member";
                                        } else {
                                            $('<div class="alert alert-danger">' +
                                                '<button type="button" class="close" data-dismiss="alert">' +
                                                `&times;</button>${message}</div>`).hide().prependTo('#form_changepass').fadeIn(1000);

                                            $(".alert").delay(3000).fadeOut(
                                                "normal",
                                                function() {
                                                    $(this).remove();
                                                });
                                        }


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