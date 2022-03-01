
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
                                        <input onchange="VerifyUploadSizeIsOK()" id="admin_img" style="padding-top: 5px;" class="form-control" accept="image/png, image/jpg, image/jpeg" type="file" />
                                        <p style="margin-left:20px; font-size: 11px;"> *Notes : Max File 2MB*</p>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="text" id="admin_nohp" class="form-control " placeholder="Masukan No. Telepon admin" aria-label="pnumber" required />
                                    </div>
                                    <div class="form-group">
                                    <label>Gender</label>
                                    <br>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="radioMale" value="male" name="inlineDefaultRadiosExample">
                                        <p class="custom-control-label" for="defaultInline1" style="font-size: 13px;">Laki Laki</p>
                                    </div>

                                    <!-- Default inline 2-->
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="radioFemale" value="female" name="inlineDefaultRadiosExample">
                                        <p class="custom-control-label" for="defaultInline2"style="font-size: 13px;">Perempuan</p>
                                    </div>
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
                                    "gender",
                                    document.querySelector('input[name = gender]:checked').value
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
                                        console.log(data);

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

                            function VerifyUploadSizeIsOK() {
                                const UploadFieldID = "admin_img";
                                var MaxSizeInBytes = 2097152;
                                var fld = document.getElementById(UploadFieldID);
                                if (fld.files && fld.files.length == 1 && fld.files[0].size > MaxSizeInBytes) {
                                    fld.value = "";
                                    alert("The file size must be no more than " + parseInt(MaxSizeInBytes / 1024 / 1024) + "MB");
                                }

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