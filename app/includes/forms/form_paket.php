<div class="main-panel">
    <div class="content-wrapper">
        <div class="row page-title-header">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title">Menambahkan Paket Klub Ade Rai
                        <button id="owbackpaket" style="float:right; margin-left:5px; display: none;" type="submit" class="btn btn-inverse-danger btn-sm" onclick="window.location.href='/owform_member'">Back</button>
                        <button id="backpaket" style="float:right; margin-left:5px; display: none;" type="submit" class="btn btn-inverse-danger btn-sm" onclick="window.location.href='/owform_member'">Back</button>
                    </h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form id="form_paket" onsubmit="daftarPaket(); return false" class="form sample">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input id="nama_paket" type="text" class="form-control form-control-lg" placeholder="Masukan Nama Paket" aria-label="name" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Harga</label>
                                        <input id="harga_paket" type="text" class="form-control form-control-lg" placeholder="Masukan Harga Paket" aria-label="pob" required />
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Durasi </label>
                                        <input id="durasi_paket" type="number" class="form-control form-control-lg" placeholder="Masukan Durasi Paket" aria-label="name" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Token</label>
                                        <input id="token_paket" type="number" class="form-control form-control-lg" placeholder="Masukan Token" aria-label="pob" required />
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-inverse-success btn-sm">
                                Submit
                            </button>
                            <button type="button" onclick="window.location.href='/'" class="btn btn-inverse-dark btn-sm">Cancel</button>
                        </form>

                        <!-- onclick="window.location.href='/'" -->
                        <script>
                            var myalert = document.getElementById("alert");
                            var failalert = document.getElementById("alertfail");
                            var close = document.getElementsByClassName("closebtn");
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

                            function daftarPaket() {
                                var tokenSession = '<?php echo $_SESSION['token']; ?>';
                                var email = '<?php echo $_SESSION['email']; ?>';
                                var token = "Bearer" + " " + tokenSession;
                                var myHeaders = new Headers();
                                myHeaders.append("Authorization", token);
                                myHeaders.append("Content-Type", "application/x-www-form-urlencoded");

                                var urlencoded = new URLSearchParams();
                                urlencoded.append(
                                    "paket",
                                    document.getElementById("nama_paket").value
                                );
                                urlencoded.append(
                                    "harga",
                                    document.getElementById("harga_paket").value
                                );
                                urlencoded.append(
                                    "createdby",
                                    email
                                );
                                urlencoded.append(
                                    "duration",
                                    document.getElementById("durasi_paket").value
                                );
                                urlencoded.append(
                                    "nilai_token",
                                    document.getElementById("token_paket").value
                                );

                                var requestOptions = {
                                    method: "POST",
                                    headers: myHeaders,
                                    body: urlencoded,
                                    redirect: "follow",
                                };
                                fetch(
                                        "https://api.klubaderai.com/api/pakets",
                                        requestOptions
                                    )
                                    .then((response) => response.text())
                                    .then((result => {
                                        document.getElementById("form_paket").reset();

                                        $('<div class="alert alert-success">' +
                                            '<button type="button" class="close" data-dismiss="alert">' +
                                            '&times;</button>Data Berhasil Disimpan</div>').hide().prependTo('#form_paket').fadeIn(1000);

                                        $(".alert").delay(3000).fadeOut(
                                            "normal",
                                            function() {
                                                $(this).remove();
                                            });
                                    }))
                                    .catch((error => {

                                        $('<div class="alert alert-danger">' +
                                            '<button type="button" class="close" data-dismiss="alert">' +
                                            '&times;</button>Terjadi Kesalahan</div>').hide().prependTo('#form_paket').fadeIn(1000);

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
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright ©️ 2022. All Rights Reserved</span>
        </div>
    </footer>
    <!-- partial -->
</div>