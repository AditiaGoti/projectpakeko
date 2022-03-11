<div class="main-panel">
    <div class="content-wrapper">
        <div class="row page-title-header">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title">Merubah Member Klub Ade Rai
                        <button id="owbackumember" style="float:right; margin-left:5px;display: none;" type="submit" class="btn btn-inverse-danger btn-sm" onclick="window.location.href='/owall_member'">Back</button>
                        <button id="backumember" style="float:right; margin-left:5px; display: none;" type="submit" class="btn btn-inverse-danger btn-sm" onclick="window.location.href='/all_member'">Back</button>
                    </h4>
                </div>
            </div>
        </div>
        <script>
            var type = '<?php echo $_SESSION['type']; ?>'
            if (type == 2) {
                var btnAdd = document.getElementById("owbackumember")
                btnAdd.style.display = 'block'

            } else {
                var btnAdd = document.getElementById("backumember")
                btnAdd.style.display = 'block'
            }
        </script>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form onsubmit="updateProfile(); return false" id="form_member" class="form sample">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input id="member_email" type="email" class="form-control form-control-lg" placeholder="Masukan Email member" aria-label="email" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input id="member_name" type="text" class="form-control form-control-lg" placeholder="Masukan Nama member" aria-label="name" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Place of Birth</label>
                                        <input id="member_pob" type="text" class="form-control form-control-lg" placeholder="Masukan Tempat Lahir member" aria-label="pob" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Date of Birth</label>
                                        <input id="member_dob" type="date" class="form-control form-control-lg" placeholder="Masukan Tanggal Lahir member" aria-label="dob" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="text" id="member_nohp" class="form-control form-control-lg" placeholder="Masukan No. Telepon member" aria-label="pnumber" required />
                                    </div>
                                </div>
                                <div class="col">

                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" id="member_address" class="form-control form-control-lg" placeholder="Masukan Alamat member" aria-label="adress" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Photo</label>
                                        <img id="memberimg_values" style="margin-top:30px; margin-bottom:23px; " src="" width="200px" height="200px">
                                        <input onchange="VerifyUploadSizeIsOK()" id="member_img" style="padding-top: 5px;" class="form-control" accept="image/png, image/jpg, image/jpeg" type="file" />
                                        <p style="margin-left:20px; font-size: 11px;"> *Notes : Max File 2MB*</p>
                                    </div>
                                    <button type="submit" class="btn btn-inverse-success btn-lg btn-block">
                                        Submit
                                    </button>
                                    <button type="button" onclick="reset()" class="btn btn-inverse-dark btn-lg btn-block">Reset</button>

                                </div>
                                <button type="submit" class="btn btn-inverse-success btn-lg btn-block">
                                    Submit
                                </button>
                                <button type="button" onclick="window.location.href='/'" class="btn btn-inverse-dark btn-lg btn-block">Cancel</button>
                            </div>

                        </form>

                        <script>
                            var myArray = [];
                            var tokenSession = '<?php echo $_SESSION['token']; ?>';
                            var token = "Bearer" + " " + tokenSession;
                            var memID = sessionStorage.getItem("id-member");
                            var type = `<?php echo $_SESSION['type']; ?>`;
                            var form = document.getElementById("form_member");
                            const url = "https://api.tms-klar.com/api/users" + "/" + memID;

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
                                var name = document.getElementById("member_name");
                                var pob = document.getElementById("member_pob");
                                var dob = document.getElementById("member_dob");
                                var email = document.getElementById("member_email");
                                var nohp = document.getElementById("member_nohp");
                                var alamat = document.getElementById("member_address");
                                var img = document.getElementById("member_img");
                                var imgv = document.getElementById("memberimg_values");

                                name.value = data.name;
                                pob.value = data.tempat_lahir;
                                dob.value = data.tanggal_lahir;
                                email.value = data.email;
                                nohp.value = data.nohp;
                                alamat.value = data.alamat;
                                imgv.src = "https://api.tms-klar.com/public/" +
                                    data.img_path;
                                sessionStorage.setItem("email-member", email.value);
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
                            function reset(){
                                document.getElementById("form_member").reset();
                            }
                            function updateProfile() {
                                displayLoading()
                                var myHeaders = new Headers();
                                myHeaders.append("Authorization", token);
                                var formdata = new FormData();
                                var email = document.getElementById("member_email");
                                var currEmail = sessionStorage.getItem("email-member");
                                if (email.value == currEmail) {
                                    //
                                } else {
                                    formdata.append(
                                        "email",
                                        email.value
                                    );
                                }
                                formdata.append(
                                    "name",
                                    document.getElementById("member_name").value
                                );
                                formdata.append(
                                    "tempat_lahir",
                                    document.getElementById("member_pob").value
                                );
                                formdata.append(
                                    "tanggal_lahir",
                                    document.getElementById("member_dob").value
                                );
                                formdata.append(
                                    "nohp",
                                    document.getElementById("member_nohp").value
                                );
                                formdata.append(
                                    "alamat",
                                    document.getElementById("member_address").value
                                );

                                var foto = document.getElementById("member_img").files[0]
                                if (foto == null) {
                                    // 
                                } else {
                                    formdata.append(
                                        "img_path", foto
                                    );
                                }

                                var requestOptions = {
                                    method: "post",
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
                                        hideLoading()
                                        var data = JSON.parse(result);
                                        var hasildata = data.success;
                                        var message = data.message;

                                        if (hasildata) {
                                            $('<div class="alert alert-success">' +
                                                '<button type="button" class="close" data-dismiss="alert">' +
                                                '&times;</button>Data Berhasil Disimpan</div>').hide().prependTo('#form_member').fadeIn(1000);
                                            if (type == 2) {
                                                location.href = "/owall_member";
                                            } else if (type == 1)
                                                location.href = "/all_member";
                                            $(".alert").delay(3000).fadeOut(
                                                "normal",
                                                function() {
                                                    $(this).remove();
                                                });
                                            document.getElementById("form_member").reset();
                                            document.getElementById('memberimg_values').src = "";
                                            sessionStorage.removeItem("email-member");
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


                                    }))
                                    .catch((error => {
                                        $('<div class="alert alert-danger">' +
                                            '<button type="button" class="close" data-dismiss="alert">' +
                                            '&times;</button>Terjadi Kesalahan</div>').hide().prependTo('#formu_member').fadeIn(1000);

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