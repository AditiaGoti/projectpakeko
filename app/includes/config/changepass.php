<div class="main-panel">
    <div class="content-wrapper">
        <div class="row page-title-header">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title">Merubah Password Profile</h4>
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
                        <form id="form_admin" class="form sample">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input disabled id="admin_email" type="email" class="form-control form-control-lg" placeholder="Masukan Email admin" aria-label="email" required />
                                    </div>
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

                                </div>
                            </div>
                        </form>
                        <button onclick="updatePassword()" type="submit" class="btn btn-success mr-3">
                            Submit
                        </button>
                        <button class="btn btn-danger">Cancel</button>
                        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                        <script>
                            var myArray = [];
                            var tokenSession = '<?php echo $_SESSION['token']; ?>';
                            var token = "Bearer" + " " + tokenSession;
                            var id = `<?php echo $_SESSION['id']; ?>`;
                            var form = document.getElementById("form_admin");
                            const url = "https://api.klubaderai.com/api/users" + "/" + id;

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
                                var pass = document.getElementById("admin_pass");
                                var cpass = document.getElementById("admin_cpass");

                                name.value = data.name;
                                pob.value = data.tempat_lahir;
                                dob.value = data.tanggal_lahir;
                                email.value = data.email;
                                nohp.value = data.nohp;
                                alamat.value = data.alamat;
                                // pass.value = data.pass;
                                // cpass.value = data.cpass;
                            }
                        </script>
                        <script>
                            function updatePassword() {
                                var myalert = document.getElementById("alert");
                                var failalert = document.getElementById("alertfail");
                                var close = document.getElementsByClassName("close");
                                var i;
                                for (i = 0; i < close.length; i++) {
                                    close.onclick = function() {
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

                            }
                        </script>
                        <script>
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

                            function alertsuccess() {
                                myalert.style.display = 'block'
                            }

                            function alertfailed() {
                                failalert.style.display = 'block'
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