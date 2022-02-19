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
                        <form onsubmit="updateProfile(); return false" id="form_admin" class="form sample">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input id="admin_email" type="email" class="form-control form-control-lg" placeholder="Masukan Email admin" aria-label="email" disabled />
                                    </div>
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input id="admin_name" type="text" class="form-control form-control-lg" placeholder="Masukan Nama admin" aria-label="name" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Place of Birth</label>
                                        <input id="admin_pob" type="text" class="form-control form-control-lg" placeholder="Masukan Tempat Lahir admin" aria-label="pob" required />
                                    </div>

                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Date of Birth</label>
                                        <input id="admin_dob" type="date" class="form-control form-control-lg" placeholder="Masukan Tanggal Lahir admin" aria-label="dob" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="text" id="admin_nohp" class="form-control form-control-lg" placeholder="Masukan No. Telepon admin" aria-label="pnumber" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" id="admin_address" class="form-control form-control-lg" placeholder="Masukan Alamat admin" aria-label="adress" required />
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-inverse-success btn-sm">
                                Submit
                            </button>
                            <button onclick="window.location.href='/'" type="button" class="btn btn-inverse-dark btn-sm">Cancel</button>
                        </form>

                        <script>
                            var myArray = [];
                            var tokenSession = '<?php echo $_SESSION['token']; ?>';
                            var token = "Bearer" + " " + tokenSession;
                            var admID = sessionStorage.getItem("id-admin");
                            var form = document.getElementById("form_admin");
                            const url = "https://api.klubaderai.com/api/users" + "/" + admID;

                            $.ajax({
                                method: "GET",
                                url: url,
                                headers: {
                                    Authorization: token
                                },
                                success: function(response) {
                                    myArray = response.data;
                                    build(myArray);
                                },
                            });

                            function build(data) {
                                var name = document.getElementById("admin_name");
                                var pob = document.getElementById("admin_pob");
                                var dob = document.getElementById("admin_dob");
                                var email = document.getElementById("admin_email");
                                var nohp = document.getElementById("admin_nohp");
                                var alamat = document.getElementById("admin_address");

                                name.value = data.name;
                                pob.value = data.tempat_lahir;
                                dob.value = data.tanggal_lahir;
                                email.value = data.email;
                                nohp.value = data.nohp;
                                alamat.value = data.alamat;
                            }
                        </script>

                        <script>
                            function updateProfile() {
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
                                const url = "https://api.klubaderai.com/api/admin" + "/" + admID;
                                myHeaders.append("Authorization", token);
                                myHeaders.append("Content-Type", "application/x-www-form-urlencoded");

                                var urlencoded = new URLSearchParams();

                                urlencoded.append(
                                    "name",
                                    document.getElementById("admin_name").value
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
                                    method: "patch",
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
                                        var data = JSON.parse(result);
                                        if (data.success) {
                                            myalert.style.display = 'block'
                                            document.getElementById("form_admin").reset();
                                            window.location.reload();
                                        } else {
                                            failalert.style.display = 'block'
                                            window.location.reload();
                                        }
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