<div class="main-panel">
    <div class="content-wrapper">
        <div class="row page-title-header">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title">Merubah Admin Klub Ade Rai
                        <button id="owbackadmin" style="float:right; margin-left:5px; display: none;" type="submit" class="btn btn-inverse-danger btn-sm" onclick="window.location.href='/owalladmin'">Back</button>
                    </h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
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
                                    <div class="form-group">
                                        <label>Date of Birth</label>
                                        <input id="admin_dob" type="date" class="form-control form-control-lg" placeholder="Masukan Tanggal Lahir admin" aria-label="dob" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="text" id="admin_nohp" class="form-control form-control-lg" placeholder="Masukan No. Telepon admin" aria-label="pnumber" required />
                                    </div>



                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" id="admin_address" class="form-control form-control-lg" placeholder="Masukan Alamat admin" aria-label="adress" required />
                                    </div>


                                    <div class="form-group">
                                        <label>Photo</label>
                                        <img id="adminimg_values" style="margin-top:30px; margin-bottom:23px; " src="" width="200px" height="200px">
                                        <input onchange="Filevalidation()" id="admin_img" style="padding-top: 5px;" class="form-control" accept="image/png, image/jpg, image/jpeg" type="file" />
                                        <label>Max File 2MB</label>
                                    </div>
                                    <button type="submit" id="btn" class="btn btn-inverse-success btn-sm">
                                        Submit
                                    </button>
                                    <button type="button" onclick="window.location.href='/'" class="btn btn-inverse-dark btn-sm">Cancel</button>

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
                                var reader = new FileReader();
                                reader.onload = function() {
                                    fi.src = reader.result;
                                };
                                reader.readAsDataURL(event.target.files[0]);

                            }

                            var myArray = [];
                            var tokenSession = '<?php echo $_SESSION['token']; ?>';
                            var token = "Bearer" + " " + tokenSession;
                            var admID = sessionStorage.getItem("id-admin");
                            var form = document.getElementById("form_admin");
                            const url = "https://api.klubaderai.com/api/admin" + "/" + admID;

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
                                var img = document.getElementById("admin_img");
                                var imgv = document.getElementById("adminimg_values");

                                name.value = data.name;
                                pob.value = data.tempat_lahir;
                                dob.value = data.tanggal_lahir;
                                email.value = data.email;
                                nohp.value = data.nohp;
                                alamat.value = data.alamat;
                                imgv.src = "https://api.klubaderai.com/public/storage/" +
                                    data.img_path;

                            }
                        </script>

                        <script>
                            function updateProfile() {
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
                                        var hasildata = data.success;
                                        var message = data.errors;
                                        document.getElementById("form_admin").reset();
                                        if (hasildata) {
                                            $('<div class="alert alert-success">' +
                                                '<button type="button" class="close" data-dismiss="alert">' +
                                                '&times;</button>Data Berhasil Disimpan</div>').hide().prependTo('#form_admin').fadeIn(1000);

                                            $(".alert").delay(3000).fadeOut(
                                                "normal",
                                                function() {
                                                    $(this).remove();
                                                });
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
                                            '&times;</button>Terjadi Kesalahan</div>').hide().prependTo('#formu_admin').fadeIn(1000);

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