<div class="main-panel">
    <div class="content-wrapper">
        <div class="row page-title-header">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title">Menambahkan Transaksi Klub Ade Rai
                        <button id="owbacktransaksi" style="float:right; margin-left:5px; display: none;" type="submit" class="btn btn-inverse-danger btn-sm" onclick="window.location.href='/owtransaksi'">Back</button>
                        <button id="backtransaksi" style="float:right; margin-left:5px; display: none;" type="submit" class="btn btn-inverse-danger btn-sm" onclick="window.location.href='/transaksi'">Back</button>
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
                        <form onsubmit="return false" id="form_transaksi" class="form sample">

                            <div class="form-group">
                                <label>ID</label>
                                <input id="id_member" type="text" class="form-control form-control-lg" placeholder="Masukan ID Member" aria-label="name" required />
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Package</label>
                                <select class="form-control form-control-lg" id="package" required>
                                    <option>-</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <input id="keterangan" type="text" class="form-control form-control-lg" aria-label="Nominal" />
                            </div>
                            <button onclick="daftarTransaksi() " type="button" class="btn btn-inverse-success btn-lg btn-block">
                                Submit
                            </button>
                            <button type="button" onclick="window.location.href='/'" class="btn btn-inverse-dark btn-lg btn-block">Cancel</button>
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
                        </script>
                        <script>
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

                            function daftarTransaksi() {
                                displayLoading()
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
                                    "id_paket",
                                    document.getElementById("package").value
                                );
                                urlencoded.append(
                                    "keterangan",
                                    document.getElementById("keterangan").value
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