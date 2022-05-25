<div class="main-panel">
    <div class="content-wrapper">
        <div class="row page-title-header">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title">Menambahkan Transaksi Klub Ade Rai
                        <button id="owbacktransaksi" style="float:right; margin-left:5px; display: none;" type="submit" class="btn btn-inverse-danger btn-sm" onclick="window.location.href='/Metland/owtransaksi'">Back</button>
                        <button id="backtransaksi" style="float:right; margin-left:5px; display: none;" type="submit" class="btn btn-inverse-danger btn-sm" onclick="window.location.href='/Metland/transaksi'">Back</button>
                    </h4>
                </div>
            </div>
        </div>
        <script>
            var type = '<?php echo $_SESSION['type']; ?>'
            if (type == 2) {
                var btnAdd = document.getElementById("owbacktransaksi")
                btnAdd.style.display = 'block'

            } else {
                var btnAdd = document.getElementById("backtransaksi")
                btnAdd.style.display = 'block'
            }
        </script>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form onsubmit="checkID();return false" id="form_transaksi" class="form sample">
                            <div class="input-group mb-3">
                                <label style="margin-top:5px; padding-right:95px;">ID</label>
                                <input id="id_member" type="text" class="form-control form-control-lg" placeholder="Masukan ID Member" aria-label="name" required />
                                <div class="input-group-append">
                                    <button class="btn btn-outline-primary" type="submit"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                            <hr>
                            <div class="input-group mb-3">
                                <label style="margin-top:5px; padding-right:70px;">Name</label>
                                <input id="member_name" type="text" class="form-control form-control-lg" placeholder="Masukan Nama Member" aria-label="name" />
                                <div class="input-group-append">
                                    <button onclick="checkName(); return false" class="btn btn-outline-primary" type="button"><i class="fa fa-search"></i></button>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <label style="margin-top:5px; padding-right:23px;">Date of Birth</label>
                                <input id="member_dob" type="date" class="form-control form-control-lg" placeholder="Masukan Tanggal Lahir Member" aria-label="dob" />
                            </div>
                            <hr>
                            <div class="input-group mb-3">
                                <label for="exampleFormControlSelect1" style="margin-top:5px; padding-right:49px;">Package</label>
                                <select class="form-control form-control-lg" id="package" required>
                                    <option>-</option>
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <label for="exampleFormControlSelect1" style="margin-top:5px; padding-right:20px;">Pembayaran</label>
                                <select class="form-control form-control-lg" id="pembayaran" required>
                                    <option value="Cash">Cash</option>
                                    <option value="BCA">Bank BCA</option>
                                    <option value="Mandiri">Bank Mandiri</option>
                                    <option value="Permata">Bank Permata</option>
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <label style="margin-top:5px; padding-right:28px;">Keterangan</label>
                                <input id="keterangan" type="text" class="form-control form-control-lg" aria-label="Nominal" />
                            </div>
                            <button onclick="daftarTransaksi() " type="button" class="btn btn-inverse-success btn-lg btn-block">
                                Submit
                            </button>
                            <button type="button" onclick="reeset()" class="btn btn-inverse-dark btn-lg btn-block">Reset</button>
                        </form>

                        <script>
                            var tokenSession = '<?php echo $_SESSION['token']; ?>';
                            var token = "Bearer" + " " + tokenSession;
                            var myArray = [];
                            var tablePaket = document.getElementById("package");
                            const url = "https://api.tms-klar.com/api/pakets";
                            $(document).ready(function() {
                                $.ajax({
                                    method: "GET",
                                    url: url,
                                    headers: {
                                        Authorization: token,
                                    },
                                    success: function(response) {
                                        data = response.data;
                                        $.each(data, function(i, data) {

                                            var body = `<option value='${data.id}'>` + data.paket + `</option>`;

                                            $("#package").append(body);
                                        });
                                    }
                                });
                            });
                            const loader = document.querySelector("#loading");
                            var iddis = document.getElementById("id_member");

                            function displayLoading() {
                                loader.classList.add("loading");
                                setTimeout(() => {
                                    loader.classList.remove("loading");
                                }, 8000);
                            }

                            function reeset() {
                                document.getElementById("form_transaksi").reset();
                                iddis.disabled = false;
                            }

                            function hideLoading() {
                                loader.classList.remove("loading");
                            }

                            function checkID() {
                                displayLoading()
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
                                        "https://api.tms-klar.com/api/users/" + id,
                                        requestOptions
                                    )
                                    .then((response) => response.text())
                                    .then(result => {
                                        hideLoading()
                                        var data = JSON.parse(result);

                                        var hasildata = data.success;
                                        var message = data.message;
                                        var namevalue = data.data.name;
                                        var dobvalue = data.data.tanggal_lahir;
                                        iddis.disabled = true;
                                        if (hasildata) {
                                            var name = document.getElementById("member_name");
                                            var dob = document.getElementById("member_dob");
                                            name.value = namevalue;
                                            dob.value = dobvalue;

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


                                    })
                                    .catch(error => {
                                        $('<div class="alert alert-danger">' +
                                            '<button type="button" class="close" data-dismiss="alert">' +
                                            '&times;</button>Data Tidak Ditemukan</div>').hide().prependTo('#form_kehadiran').fadeIn(1000);

                                        $(".alert").delay(3000).fadeOut(
                                            "normal",
                                            function() {
                                                $(this).remove();
                                            });
                                    });
                            }

                            function checkName() {
                                displayLoading()
                                var tokenSession = '<?php echo $_SESSION['token']; ?>';
                                var token = "Bearer" + " " + tokenSession;
                                var type = '<?php echo $_SESSION['type']; ?>'
                                const url = "https://api.tms-klar.com/api/users";
                                iddis.disabled = true;
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
                                        hideLoading()
                                        var data = JSON.parse(result);
                                        var hasildata = data.success;
                                        var elements = document.getElementById('token');
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
                                        var input_id = document.getElementById("id_member");
                                        input_id.value = id;

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

                            function daftarTransaksi() {
                                displayLoading()
                                var tokenSession = '<?php echo $_SESSION['token']; ?>';
                                var token = "Bearer" + " " + tokenSession;
                                var myHeaders = new Headers();
                                var idvalue = document.getElementById("id_member").value;
                                const id = idvalue.split("-");
                                myHeaders.append("Authorization", token);
                                myHeaders.append("Content-Type", "application/x-www-form-urlencoded");

                                var urlencoded = new URLSearchParams();

                                urlencoded.append(
                                    "id_member",
                                    id[0]
                                );
                                urlencoded.append(
                                    "id_paket",
                                    document.getElementById("package").value
                                );
                                urlencoded.append(
                                    "keterangan",
                                    document.getElementById("keterangan").value
                                );
                                urlencoded.append(
                                    "pembayaran",
                                    document.getElementById("pembayaran").value
                                );

                                var requestOptions = {
                                    method: "POST",
                                    headers: myHeaders,
                                    body: urlencoded,
                                    redirect: "follow",
                                };
                                fetch(
                                        "https://api.tms-klar.com/api/transaksi",
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
                                                '&times;</button>Data Berhasil Disimpan</div>').hide().prependTo('#form_transaksi').fadeIn(1000);

                                            $(".alert").delay(3000).fadeOut(
                                                "normal",
                                                function() {
                                                    $(this).remove();
                                                });
                                            document.getElementById("form_transaksi").reset();
                                        } else {
                                            $('<div class="alert alert-danger">' +
                                                '<button type="button" class="close" data-dismiss="alert">' +
                                                `&times;</button>${message}</div>`).hide().prependTo('#form_transaksi').fadeIn(1000);

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
                                            '&times;</button>Terjadi Kesalahan</div>').hide().prependTo('#form_transaksi').fadeIn(1000);

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