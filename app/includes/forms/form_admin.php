<div class="main-panel">
    <div class="content-wrapper">
        <div class="row page-title-header">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title">Menambahkan Admin Klub Ade Rai
                        <button id="owbackadmin" style="float:right; margin-left:5px; display: block;" type="submit" class="btn btn-inverse-danger btn-sm" onclick="window.location.href='/owalladmin'">Back</button>
                    </h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form id="form_admin" enctype="multipart/form-data" onsubmit="daftaradmin();return false" class="form sample">
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

                                    <div class="form-group">
                                        <label>Photo</label>
                                        <input onchange="Filevalidation()" id="admin_img" style="padding-top: 5px;" class="form-control" accept="image/png, image/jpg, image/jpeg" type="file" />
                                        <p style="margin-left:20px; font-size: 11px;"> *Notes : Max File 2MB*</p>
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
                                    <button style="margin-top: 25px; margin-left:11px;" type="submit" class="btn btn-inverse-success ">
                                        Submit
                                    </button>
                                    <button style="margin-top: 25px;" type="button" onclick="window.location.href='/'" class="btn btn-inverse-dark ">Cancel</button>
                                </div>
                            </div>

                        </form>

                        <script>
                            Filevalidation = () => {
                                const fi = document.getElementById('admin_img');
                                // Check if any file is selected.
                                if (fi.files.length > 0) {
                                    for (const i = 0; i <= fi.files.length - 1; i++) {

                                        const fsize = fi.files.item(i).size;
                                        const file = Math.round((fsize / 1024));
                                        // The size of the file.
                                        if (file > 2048) {
                                            alert(
                                                "File Terlalu Besar, tolong pilih file dibawah 2 MB");
                                            fi.value = "";
                                        }
                                    }
                                }
                            }



                            function daftaradmin() {

                                var tokenSession = '<?php echo $_SESSION['token']; ?>';
                                var token = "Bearer" + " " + tokenSession;
                                var myHeaders = new Headers();
                                myHeaders.append("Authorization", token);

                                var formdata = new FormData();
                                formdata.append(
                                    "name",
                                    document.getElementById("admin_name").value
                                );
                                formdata.append(
                                    "email",
                                    document.getElementById("admin_email").value
                                );
                                formdata.append(
                                    "password",
                                    document.getElementById("admin_pass").value
                                );
                                formdata.append(
                                    "password_confirmation",
                                    document.getElementById("admin_cpass").value
                                );
                                formdata.append(
                                    "tempat_lahir",
                                    document.getElementById("admin_pob").value
                                );
                                formdata.append(
                                    "tanggal_lahir",
                                    document.getElementById("admin_dob").value
                                );
                                formdata.append(
                                    "nohp",
                                    document.getElementById("admin_nohp").value
                                );
                                formdata.append(
                                    "alamat",
                                    document.getElementById("admin_address").value
                                );
                                formdata.append(
                                    "img_path",
                                    document.getElementById("admin_img").files[0]
                                );

                                var requestOptions = {
                                    method: "POST",
                                    headers: myHeaders,
                                    body: formdata,
                                    redirect: "follow",
                                };
                                fetch(
                                        "https://api.klubaderai.com/api/register",
                                        requestOptions
                                    )
                                    .then((response) => response.text())
                                    .then((result => {

                                        var data = JSON.parse(result);
                                        var hasildata = data.success;
                                        var message = data.errors;

                                        if (hasildata) {
                                            $('<div class="alert alert-success">' +
                                                '<button type="button" class="close" data-dismiss="alert">' +
                                                '&times;</button>Data Berhasil Disimpan</div>').hide().prependTo('#form_admin').fadeIn(1000);

                                            $(".alert").delay(3000).fadeOut(
                                                "normal",
                                                function() {
                                                    $(this).remove();
                                                });
                                            document.getElementById("form_admin").reset();
                                        } else {
                                            $('<div class="alert alert-danger">' +
                                                '<button type="button" class="close" data-dismiss="alert">' +
                                                `&times;</button>${message}</div>`).hide().prependTo('#form_admin').fadeIn(1000);

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
                                            '&times;</button>Terjadi Kesalahan</div>').hide().prependTo('#form_admin').fadeIn(1000);

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
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2022. All Rights Reserved</span>
        </div>
    </footer>
    <!-- partial -->
</div>