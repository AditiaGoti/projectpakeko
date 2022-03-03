<div class="main-panel">
    <div class="content-wrapper">
        <div class="row page-title-header">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title">Merubah Data Profile
                    </h4>

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
                        <form id="form_profile" onsubmit="updateProfile(); return false" class="form sample">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input disabled id="Member_email" type="email" class="form-control form-control-lg" placeholder="Masukan Email Member" aria-label="email" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input id="Member_name" type="text" class="form-control form-control-lg" placeholder="Masukan Nama Member" aria-label="name" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Place of Birth</label>
                                        <input id="Member_pob" type="text" class="form-control form-control-lg" placeholder="Masukan Tempat Lahir Member" aria-label="pob" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Date of Birth</label>
                                        <input id="Member_dob" type="date" class="form-control form-control-lg" placeholder="Masukan Tanggal Lahir Member" aria-label="dob" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="text" id="Member_nohp" class="form-control form-control-lg" placeholder="Masukan No. Telepon Member" aria-label="pnumber" required />
                                    </div>
                                </div>
                                <div class="col">

                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" id="Member_address" class="form-control form-control-lg" placeholder="Masukan Alamat Member" aria-label="adress" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Photo</label>
                                        <img id="Memberimg_values" style="margin-top:30px; margin-bottom:23px; " src="" width="200px" height="200px">
                                        <input onchange="VerifyUploadSizeIsOK()" id="Member_img" style="padding-top: 5px;" class="form-control" accept="image/png, image/jpg, image/jpeg" type="file" />
                                        <p style="margin-left:20px; font-size: 11px;"> *Notes : Max File 2MB*</p>
                                    </div>

                                    <button type="submit" class="btn btn-inverse-success btn-fw">
                                        Submit
                                    </button>
                                    <button type="button" onclick="window.location.href='/'" class="btn btn-inverse-dark btn-fw">Cancel</button>

                                </div>
                            </div>

                        </form>
                        <script>
                            var myArray = [];
                            var tokenSession = '<?php echo $_SESSION['token']; ?>';
                            var token = "Bearer" + " " + tokenSession;
                            var id = `<?php echo $_SESSION['id']; ?>`;
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
                                var name = document.getElementById("Member_name");
                                var pob = document.getElementById("Member_pob");
                                var dob = document.getElementById("Member_dob");
                                var email = document.getElementById("Member_email");
                                var nohp = document.getElementById("Member_nohp");
                                var alamat = document.getElementById("Member_address");
                                var pass = document.getElementById("Member_pass");
                                var cpass = document.getElementById("Member_cpass");
                                var img = document.getElementById("Member_img");
                                var imgv = document.getElementById("Memberimg_values");


                                name.value = data.name;
                                pob.value = data.tempat_lahir;
                                dob.value = data.tanggal_lahir;
                                email.value = data.email;
                                nohp.value = data.nohp;
                                alamat.value = data.alamat;
                                imgv.src = "https://api.klubaderai.com/public/" +
                                    data.img_path;
                            }

                            function updateProfile() {
                                var myHeaders = new Headers();
                                myHeaders.append("Authorization", token);

                                var formdata = new FormData();
                                formdata.append(
                                    "name",
                                    document.getElementById("Member_name").value
                                );
                                formdata.append(
                                    "tempat_lahir",
                                    document.getElementById("Member_pob").value
                                );
                                formdata.append(
                                    "tanggal_lahir",
                                    document.getElementById("Member_dob").value
                                );
                                formdata.append(
                                    "nohp",
                                    document.getElementById("Member_nohp").value
                                );
                                formdata.append(
                                    "alamat",
                                    document.getElementById("Member_address").value
                                );
                                var foto = document.getElementById("Member_img").files[0]
                                if (foto == null) {
                                    // 
                                } else {
                                    formdata.append(
                                        "img_path", foto
                                    );
                                }

                                var requestOptions = {
                                    method: "POST",
                                    headers: myHeaders,
                                    body: formdata,
                                    redirect: "follow",
                                };


                                fetch(
                                        url,
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
                                                '&times;</button>Data Berhasil Disimpan</div>').hide().prependTo('#form_profile').fadeIn(1000);

                                            $(".alert").delay(3000).fadeOut(
                                                "normal",
                                                function() {
                                                    $(this).remove();
                                                });
                                        } else {
                                            $('<div class="alert alert-danger">' +
                                                '<button type="button" class="close" data-dismiss="alert">' +
                                                `&times;</button>${message}</div>`).hide().prependTo('#form_profile').fadeIn(1000);

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
                                            '&times;</button>Terjadi Kesalahan</div>').hide().prependTo('#form_profile').fadeIn(1000);

                                        $(".alert").delay(3000).fadeOut(
                                            "normal",
                                            function() {
                                                $(this).remove();
                                            });
                                    }));


                            }

                            function VerifyUploadSizeIsOK() {
                                const UploadFieldID = "member_img";
                                var MaxSizeInBytes = 2097152;
                                var fld = document.getElementById(UploadFieldID);
                                if (fld.files && fld.files.length == 1 && fld.files[0].size > MaxSizeInBytes) {
                                    fld.value = "";
                                    alert("The file size must be no more than " + parseInt(MaxSizeInBytes / 1024 / 1024) + "MB");
                                }

                                var imgv = document.getElementById('memberimg_values');
                                imgv.src = "";
                                imgv.src = URL.createObjectURL(fld.files[0]);
                                imgv.onload = function() {
                                    URL.revokeObjectURL(imgv.src) // free memory
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