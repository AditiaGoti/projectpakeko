<div class="main-panel">
    <div class="content-wrapper">
        <div class="row page-title-header">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title">Menambahkan Member Klub Ade Rai
                        <button id="owbackmember" style="float:right; margin-left:5px;display: none;" type="submit" class="btn btn-inverse-danger btn-sm" onclick="window.location.href='/owall_member'">Back</button>
                        <button id="backmember" style="float:right; margin-left:5px; display: none;" type="submit" class="btn btn-inverse-danger btn-sm" onclick="window.location.href='/all_member'">Back</button>
                    </h4>
                </div>
            </div>
        </div>
        <script>
            var type = '<?php echo $_SESSION['type']; ?>'
            if (type == 2) {
                var btnAdd = document.getElementById("owbackmember")
                btnAdd.style.display = 'block'

            } else {
                var btnAdd = document.getElementById("backmember")
                btnAdd.style.display = 'block'
            }
        </script>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form id="form_member" onsubmit="daftarMember();return false" class="form sample">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input id="member_name" type="text" class="form-control form-control-lg" placeholder="Masukan Nama Member" aria-label="name" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Place of Birth</label>
                                        <input id="member_pob" type="text" class="form-control form-control-lg" placeholder="Masukan Tempat Lahir Member" aria-label="pob" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Date of Birth</label>
                                        <input id="member_dob" type="date" class="form-control form-control-lg" placeholder="Masukan Tanggal Lahir Member" aria-label="dob" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input id="member_email" type="email" class="form-control form-control-lg" placeholder="Masukan Email Member" aria-label="email" required />
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="text" id="member_nohp" class="form-control form-control-lg" placeholder="Masukan No. Telepon Member" aria-label="pnumber" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" id="member_address" class="form-control form-control-lg" placeholder="Masukan Alamat Member" aria-label="adress" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input id="member_pass" type="password" class="form-control form-control-lg" placeholder="Masukan Sandi Member" aria-label="password" required />
                                    </div>
                                    <div class="form-group">
                                        <label> Confirm Password</label>
                                        <input id="member_cpass" type="password" class="form-control form-control-lg" placeholder="Masukan Sandi Member" aria-label="password" required />
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-inverse-success btn-sm">
                                Submit
                            </button>
                            <button type="button" onclick="window.location.href='/'" class="btn btn-inverse-dark btn-sm">Cancel</button>
                        </form>

                        <script>
                            function daftarMember() {
                                var tokenSession = '<?php echo $_SESSION['token']; ?>';
                                var token = "Bearer" + " " + tokenSession;
                                var myHeaders = new Headers();
                                myHeaders.append("Authorization", token);
                                myHeaders.append("Content-Type", "application/x-www-form-urlencoded");


                                var urlencoded = new URLSearchParams();
                                urlencoded.append(
                                    "name",
                                    document.getElementById("member_name").value
                                );
                                urlencoded.append(
                                    "email",
                                    document.getElementById("member_email").value
                                );
                                urlencoded.append(
                                    "password",
                                    document.getElementById("member_pass").value
                                );
                                urlencoded.append(
                                    "password_confirmation",
                                    document.getElementById("member_cpass").value
                                );
                                urlencoded.append(
                                    "tempat_lahir",
                                    document.getElementById("member_pob").value
                                );
                                urlencoded.append(
                                    "tanggal_lahir",
                                    document.getElementById("member_dob").value
                                );
                                urlencoded.append(
                                    "nohp",
                                    document.getElementById("member_nohp").value
                                );
                                urlencoded.append(
                                    "alamat",
                                    document.getElementById("member_address").value
                                );

                                var requestOptions = {
                                    method: "POST",
                                    headers: myHeaders,
                                    body: urlencoded,
                                    redirect: "follow",
                                };
                                fetch(
                                        "https://api.klubaderai.com/api/users",
                                        requestOptions
                                    )
                                    .then((response) => response.text())
                                    .then((result => {

                                        var data = JSON.parse(result);
                                        var hasildata = data.success;
                                        var message = data.message;

                                        if (hasildata) {
                                            $('<div class="alert alert-success">' +
                                                '<button type="button" class="close" data-dismiss="alert">' +
                                                '&times;</button>Data Berhasil Disimpan</div>').hide().prependTo('#form_member').fadeIn(1000);

                                            $(".alert").delay(3000).fadeOut(
                                                "normal",
                                                function() {
                                                    $(this).remove();
                                                });
                                        } else {
                                            $('<div class="alert alert-danger">' +
                                                '<button type="button" class="close" data-dismiss="alert">' +
                                                `&times;</button>${message}</div>`).hide().prependTo('#form_member').fadeIn(1000);

                                            $(".alert").delay(3000).fadeOut(
                                                "normal",
                                                function() {
                                                    $(this).remove();
                                                });
                                        }

                                        document.getElementById("form_member").reset();


                                    }))
                                    .catch((error => {
                                        $('<div class="alert alert-danger">' +
                                            '<button type="button" class="close" data-dismiss="alert">' +
                                            `&times;</button>${error}</div>`).hide().prependTo('#form_member').fadeIn(1000);

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