<style>
    .profile-card {
        position: relative;
        overflow: hidden;
        margin-top: -150px;
        box-shadow: 0px 2px 3px #222;
        top: 150px;
    }

    .profile-card:hover .profile-img img {
        transform: scale(1.2);
    }

    .profile-card .profile-img img {
        width: 100%;
        height: 250px;

        transition: transform 1s;

    }

    @media only screen and (min-width: 280px) and (max-width:360px) {
        .profile-card {

            overflow: hidden;
            margin-left: 15px;
        }

        .profile-card:hover .profile-img img {
            transform: scale(1.2);
        }

        .profile-card .profile-img img {
            width: 100%;
            height: auto;
            transition: transform 1s;

        }

        .buttonkehadiran {
            margin-top: 180px;
            margin-left: 10px;
        }
    }

    @media only screen and (min-width:768px) and (max-width:898px) {
        .user-card-full {
            overflow: hidden;
            width: 690px;
            margin-left: -50px;
            margin-top: -50px;
        }

        .m-b-25 {
            margin-bottom: 0px;
            margin-left: -5px;

        }

        .buttonupdate {
            margin-left: -190px;
        }
    }

    @media only screen and (min-width:912px) and (max-width:992px) {
        .user-card-full {
            overflow: hidden;
            width: 800px;
            margin-left: -50px;
            margin-top: -50px;
        }

        .m-b-25 {
            margin-bottom: 0px;
            margin-left: -5px;

        }

        .buttonupdate {
            margin-left: -190px;
        }

    }

    @media only screen and (min-width:400px) and (max-width:500px) {
        .profile-card {
            overflow: hidden;
            margin-left: 15px;
        }

        .profile-card:hover .profile-img img {
            transform: scale(1.2);
        }

        .profile-card .profile-img img {
            width: 100%;
            height: auto;
            transition: transform 1s;
        }

        .buttonkehadiran {
            margin-top: 180px;
            margin-left: 10px;
        }


    }

    @media only screen and (min-width:540px) and (max-width:600px) {
        .profile-card {
            overflow: hidden;
            margin-left: 15px;
        }

        .profile-card:hover .profile-img img {
            transform: scale(1.2);
        }

        .profile-card .profile-img img {
            width: 100%;
            height: auto;
            transition: transform 1s;
        }

        .buttonkehadiran {
            margin-top: 180px;
            margin-left: 10px;
        }

    }

    @media only screen and (min-width:650px) and (max-width:699px) {
        .profile-card {
            overflow: hidden;
            margin-left: 15px;
        }

        .profile-card:hover .profile-img img {
            transform: scale(1.2);
        }

        .profile-card .profile-img img {
            width: 100%;
            height: 200px;
            transition: transform 1s;
        }


    }

    @media only screen and (min-width:360px) and (max-width:399px) {

        .profile-card {
            overflow: hidden;
            margin-left: 15px;
        }

        .profile-card:hover .profile-img img {
            transform: scale(1.2);
        }

        .profile-card .profile-img img {
            width: 100%;
            height: auto;
            transition: transform 1s;
        }

        .buttonkehadiran {
            margin-top: 180px;
            margin-left: 10px;
        }

    }
</style>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row page-title-header">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title">Menambahkan Kehadiran Member Klub Ade Rai
                        <button id="owbackkehadiran" style="float:right; margin-left:5px; display: none;" type="submit" class="btn btn-inverse-danger btn-sm" onclick="window.location.href='/owkehadiran'">Back</button>
                        <button id="backkehadiran" style="float:right; margin-left:5px; display: none;" type="submit" class="btn btn-inverse-danger btn-sm" onclick="window.location.href='/kehadiran'">Back</button>
                    </h4>
                </div>
            </div>
        </div>
        <script>
            var type = '<?php echo $_SESSION['type']; ?>'
            if (type == 2) {
                var btnAdd = document.getElementById("owbackkehadiran")
                btnAdd.style.display = 'block'

            } else {
                var btnAdd = document.getElementById("backkehadiran")
                btnAdd.style.display = 'block'
            }
        </script>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form onsubmit="daftarKehadiran();return false" id="form_kehadiran" class="form sample">
                            <div class="row">
                                <div class="col">
                                    <form>
                                        <div class="input-group mb-3">
                                            <label style="margin-top:5px">QR Code Value</label>
                                            <input required id="id_member" type="text" class="form-control  placeholder=" Masukan ID Member" form-control-lg" aria-label="name" required />
                                            <div class="input-group-append">
                                                <button onclick="checkID(); return false" class="btn btn-outline-primary" type="button"><i class="fa fa-search"></i> </button>
                                            </div>
                                        </div>
                                    </form>
                                    <hr>
                                    <form id="form_kehadiranNama" onsubmit="checkName(); return false">
                                        <div class="input-group mb-3">
                                            <label style="margin-top:5px; padding-right:70px;">Name</label>
                                            <input required id="member_name" type="text" class="form-control form-control-lg" placeholder="Masukan Nama Member" aria-label="name" required />
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-primary" type="submit"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                        <div class="input-group mb-3">
                                            <label style="margin-top:5px; padding-right:17px;">Date of Birth</label>
                                            <input required id="member_dob" type="date" class="form-control form-control-lg" placeholder="Masukan Tanggal Lahir Member" aria-label="dob" required />
                                        </div>
                                        <hr>
                                        <div class="input-group mb-3">
                                            <label style="margin-top:5px; padding-right:17px;">Expired Date</label>
                                            <input id="member_exp" class="form-control form-control-lg" placeholder="Expired Date" aria-label="dob" disabled />
                                        </div>
                                    </form>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="profile-card">
                                        <div id="member_img" class="profile-img">
                                            <img id="img_member" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="buttonkehadiran">
                                <button onclick="daftarKehadiran()" type="button" class="btn btn-inverse-success btn-sm">
                                    Submit
                                </button>
                                <button type="button" onclick="window.location.href='/'" class="btn btn-inverse-dark btn-sm">Cancel</button>
                            </div>
                        </form>

                        <script>
                            function checkID() {
                                var img = document.getElementById("img_member");
                                img.src = "";
                                var tokenSession = '<?php echo $_SESSION['token']; ?>';
                                var token = "Bearer" + " " + tokenSession;
                                var id = document.getElementById("id_member").value;
                                var myHeaders = new Headers();
                                myHeaders.append("Authorization", token);
                                myHeaders.append("Content-Type", "application/x-www-form-urlencoded");

                                var requestOptions = {
                                    method: "GET",
                                    headers: myHeaders,
                                    redirect: "follow",
                                };
                                fetch(
                                        "https://api.klubaderai.com/api/users/" + id,
                                        requestOptions
                                    )
                                    .then((response) => response.text())
                                    .then((result => {

                                        var data = JSON.parse(result);
                                        var hasildata = data.success;
                                        var message = data.message;
                                        var expiredvalue = data.data.expired;
                                        var namevalue = data.data.name;
                                        var dobvalue = data.data.tanggal_lahir;
                                        var imgvalue = "https://api.klubaderai.com" +
                                            data.data.img_path;
                                        if (hasildata) {
                                            var name = document.getElementById("member_name");
                                            var dob = document.getElementById("member_dob");
                                            var exp = document.getElementById("member_exp");
                                            name.value = namevalue;
                                            dob.value = dobvalue;
                                            img.src = imgvalue;
                                            exp.value = expiredvalue;

                                        } else {
                                            $('<div class="alert alert-danger">' +
                                                '<button type="button" class="close" data-dismiss="alert">' +
                                                `&times;</button>${message}</div>`).hide().prependTo('#form_kehadiran').fadeIn(1000);

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
                                            `&times;</button>${error}</div>`).hide().prependTo('#form_kehadiran').fadeIn(1000);

                                        $(".alert").delay(3000).fadeOut(
                                            "normal",
                                            function() {
                                                $(this).remove();
                                            });
                                    }));
                            }

                            function checkName() {
                                var img = document.getElementById("img_member");
                                img.src = "";
                                var tokenSession = '<?php echo $_SESSION['token']; ?>';
                                var token = "Bearer" + " " + tokenSession;
                                var type = '<?php echo $_SESSION['type']; ?>'
                                const url = "https://api.klubaderai.com/api/users";

                                var myHeaders = new Headers();
                                myHeaders.append("Authorization", token);
                                myHeaders.append("Content-Type", "application/x-www-form-urlencoded");

                                var requestOptions = {
                                    method: 'GET',
                                    headers: myHeaders,
                                    redirect: 'follow'
                                };


                                fetch(url, requestOptions)
                                    .then(response => response.text())
                                    .then(result => {
                                        var data = JSON.parse(result);
                                        var hasildata = data.success;
                                        var users = data.data;
                                        var filter = {
                                            name: document.getElementById("member_name").value,
                                            tanggal_lahir: document.getElementById('member_dob').value
                                        };

                                        var filters = users.filter(function(item) {
                                            for (var key in filter) {
                                                if (item[key] === undefined || item[key] != filter[key])
                                                    return false;
                                            }
                                            return true;
                                        });
                                        var filterData = filters[0];
                                        var id = filterData.id;
                                        var name = filterData.name;
                                        var dob = filterData.tanggal_lahir;
                                        var exp = filterData.expired;
                                        var imgvalue = "https://api.klubaderai.com/storage/" + filterData.img_path;
                                        var input_id = document.getElementById("id_member");
                                        var input_exp = document.getElementById("member_exp");
                                        input_exp.value = exp;
                                        input_id.value = id;
                                        img.src = imgvalue;

                                    })
                                    .catch(error => {
                                        $('<div class="alert alert-danger">' +
                                            '<button type="button" class="close" data-dismiss="alert">' +
                                            `&times;</button>Data Tidak Ditemukan</div>`).hide().prependTo('#form_kehadiran').fadeIn(1000);

                                        $(".alert").delay(3000).fadeOut(
                                            "normal",
                                            function() {
                                                $(this).remove();
                                            });
                                    });

                            }

                            function daftarKehadiran() {

                                var tokenSession = '<?php echo $_SESSION['token']; ?>';
                                var token = "Bearer" + " " + tokenSession;
                                var myHeaders = new Headers();
                                myHeaders.append("Authorization", token);
                                myHeaders.append("Content-Type", "application/x-www-form-urlencoded");

                                var urlencoded = new URLSearchParams();
                                urlencoded.append(
                                    "id_member",
                                    document.getElementById("id_member").value
                                );
                                urlencoded.append(
                                    "name",
                                    document.getElementById("member_name").value
                                );
                                urlencoded.append(
                                    "tanggal_lahir",
                                    document.getElementById("member_dob").value
                                );

                                var requestOptions = {
                                    method: "POST",
                                    headers: myHeaders,
                                    body: urlencoded,
                                    redirect: "follow",
                                };
                                fetch(
                                        "https://api.klubaderai.com/api/kehadiran",
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
                                                '&times;</button>Data Berhasil Disimpan</div>').hide().prependTo('#form_kehadiran').fadeIn(1000);

                                            $(".alert").delay(3000).fadeOut(
                                                "normal",
                                                function() {
                                                    $(this).remove();
                                                });
                                            document.getElementById("form_kehadiran").reset();
                                            document.getElementById("form_kehadiranNama").reset();
                                            document.getElementById("img_member").src = "";
                                        } else {
                                            $('<div class="alert alert-danger">' +
                                                '<button type="button" class="close" data-dismiss="alert">' +
                                                `&times;</button>${message}</div>`).hide().prependTo('#form_kehadiran').fadeIn(1000);

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
                                            '&times;</button>Terjadi Kesalahan</div>').hide().prependTo('#form_kehadiran').fadeIn(1000);

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