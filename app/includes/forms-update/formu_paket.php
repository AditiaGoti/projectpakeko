<div class="main-panel">
    <div class="content-wrapper">
        <div class="row page-title-header">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title">Menambahkan Paket Klub Ade Rai</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form onsubmit="updatePaket();return false" id="form_paket" class="form sample">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input id="nama_paket" type="text" class="form-control form-control-lg" placeholder="Masukan Nama Member" aria-label="name" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Harga</label>
                                        <input id="harga_paket" type="text" class="form-control form-control-lg" placeholder="Masukan Tempat Lahir Member" aria-label="pob" required />
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Durasi </label>
                                        <input id="durasi_paket" type="number" class="form-control form-control-lg" placeholder="Masukan Nama Member" aria-label="name" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Token</label>
                                        <input id="token_paket" type="number" class="form-control form-control-lg" placeholder="Masukan Tempat Lahir Member" aria-label="pob" required />
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-inverse-success btn-sm">
                                Submit
                            </button>
                            <button type="button" id="btn" class="btn btn-inverse-dark btn-sm">Cancel</button>
                        </form>


                        <script>
                            var myArray = [];
                            var tokenSession = '<?php echo $_SESSION['token']; ?>';
                            var token = "Bearer" + " " + tokenSession;
                            var id = `<?php echo $_SESSION['id']; ?>`;
                            var pakID = sessionStorage.getItem("id-paket");;
                            var form = document.getElementById("form_paket");
                            const url = "https://api.klubaderai.com/api/pakets" + "/" + pakID;

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
                                var nama = document.getElementById("nama_paket");
                                var harga = document.getElementById("harga_paket");
                                var durasi = document.getElementById("durasi_paket");
                                var ntoken = document.getElementById("token_paket");

                                nama.value = data.paket;
                                harga.value = data.harga;
                                durasi.value = data.duration;
                                ntoken.value = data.nilai_token;
                            }
                        </script>
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

                            function updatePaket() {

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
                                    method: "put",
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
                                        if (data.success) {
                                            document.getElementById("form_paket").reset();
                                            $('<div class="alert alert-success">' +
                                                '<button type="button" class="close" data-dismiss="alert">' +
                                                '&times;</button>Data Berhasil Disimpan</div>').hide().prependTo('#form_paket').fadeIn(1000);

                                            $(".alert").delay(3000).fadeOut(
                                                "normal",
                                                function() {
                                                    $(this).remove();
                                                });
                                        } else {
                                            $('<div class="alert alert-danger">' +
                                                '<button type="button" class="close" data-dismiss="alert">' +
                                                '&times;</button>Terjadi Kesalahan</div>').hide().prependTo('#form_paket').fadeIn(1000);

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
                                            '&times;</button>Terjadi Kesalahan</div>').hide().prependTo('#response').fadeIn(1000);

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