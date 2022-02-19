<div class="main-panel">
    <div class="content-wrapper">
        <div class="row page-title-header">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title">Menambahkan Admin Klub Ade Rai</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div style="display: none;" class="alert alert-success " id="alert">
                            <span class="close">&times;</span>
                            <strong>Data Berhasil Disimpan</strong>
                        </div>
                        <div style="display: none;" class="alert alert-danger" id='alertfail'>
                            <span class="close">&times;</span>
                            <strong>Terjadi Kesalahan</strong>
                        </div>
                        <form id="form_admin" onsubmit="daftaradmin();return false" class="form sample">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input id="admin_name" type="text" class="form-control form-control-lg" placeholder="Masukan Nama admin" aria-label="name" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Place of Birth</label>
                                        <input id="admin_pob" type="text" class="form-control form-control-lg" placeholder="Masukan Tempat Lahir admin" aria-label="pob" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Date of Birth</label>
                                        <input id="admin_dob" type="date" class="form-control form-control-lg" placeholder="Masukan Tanggal Lahir admin" aria-label="dob" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input id="admin_email" type="email" class="form-control form-control-lg" placeholder="Masukan Email admin" aria-label="email" required />
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="text" id="admin_nohp" class="form-control form-control-lg" placeholder="Masukan No. Telepon admin" aria-label="pnumber" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" id="admin_address" class="form-control form-control-lg" placeholder="Masukan Alamat admin" aria-label="adress" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input id="admin_pass" type="password" class="form-control form-control-lg" placeholder="Masukan Sandi admin" aria-label="password" required />
                                    </div>
                                    <div class="form-group">
                                        <label> CPassword</label>
                                        <input id="admin_cpass" type="password" class="form-control form-control-lg" placeholder="Masukan Sandi admin" aria-label="password" required />
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-inverse-success btn-sm">
                                Submit
                            </button>
                            <button type="button" onclick="window.location.href='/'" class="btn btn-inverse-dark btn-sm">Cancel</button>

                        </form>

                        <script>
                            function daftaradmin() {
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

                                var tokenSession = '<?php echo $_SESSION['token']; ?>';
                                var token = "Bearer" + " " + tokenSession;
                                var myHeaders = new Headers();
                                myHeaders.append("Authorization", token);
                                myHeaders.append("Content-Type", "application/x-www-form-urlencoded");

                                var urlencoded = new URLSearchParams();
                                urlencoded.append(
                                    "name",
                                    document.getElementById("admin_name").value
                                );
                                urlencoded.append(
                                    "email",
                                    document.getElementById("admin_email").value
                                );
                                urlencoded.append(
                                    "password",
                                    document.getElementById("admin_pass").value
                                );
                                urlencoded.append(
                                    "password_confirmation",
                                    document.getElementById("admin_cpass").value
                                );
                                urlencoded.append(
                                    "tempat_lahir",
                                    document.getElementById("admin_pob").value
                                );
                                urlencoded.append(
                                    "tanggal_lahir",
                                    document.getElementById("admin_dob").value
                                );
                                urlencoded.append(
                                    "nohp",
                                    document.getElementById("admin_nohp").value
                                );
                                urlencoded.append(
                                    "alamat",
                                    document.getElementById("admin_address").value
                                );

                                var requestOptions = {
                                    method: "POST",
                                    headers: myHeaders,
                                    body: urlencoded,
                                    redirect: "follow",
                                };
                                fetch(
                                        "https://api.klubaderai.com/api/register",
                                        requestOptions
                                    )
                                    .then((response) => response.text())
                                    .then((result => {
                                        myalert.style.display = 'block'
                                        document.getElementById("form_admin").reset();
                                    }))
                                    .catch((error => {
                                        alertfailed();
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
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2022. All Rights Reserved</span>
        </div>
    </footer>
    <!-- partial -->
</div>