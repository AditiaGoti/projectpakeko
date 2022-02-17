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
            <div class="col-6 grid-margin stretch-card">
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

                        <form id="form_paket" class="form sample">
                            <div class="form-group">
                                <label>Package Name</label>
                                <input id="nama_paket" type="text" class="form-control form-control-lg" placeholder="Masukan Tempat Lahir Member" aria-label="pob" required />
                            </div>
                            <div class="form-group">
                                <label>Package Price</label>
                                <input id="harga_paket" type="text" class="form-control form-control-lg" placeholder="Masukan Tempat Lahir Member" aria-label="pob" required />
                            </div>
                            <button id="updatePaket" type="submit" class="btn btn-success mr-3">
                                Submit
                            </button>
                            <button class="btn btn-danger">Cancel</button>
                        </form>

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

                            function alertsuccess() {
                                myalert.style.display = 'block'
                            }

                            function alertfailed() {
                                failalert.style.display = 'block'
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
<script>
    var myArray = [];
    var tokenSession = '<?php echo $_SESSION['token']; ?>';
    var token = "Bearer" + " " + tokenSession;
    // var id = `<?php echo $_SESSION['id']; ?>`;
    var idpaket = localStorage.getItem("idPaket")
    var form = document.getElementById("form_admin");
    const url = "https://api.klubaderai.com/api/pakets" + "/" + idpaket;

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

        nama.value = data.paket;
        harga.value = data.harga;
    }
</script>
<script>
    function updatePaket() {
        var myalert = document.getElementById("alert");
        var failalert = document.getElementById("alertfail");
        var close = document.getElementsByClassName("close");
        var i;
        for (i = 0; i < close.length; i++) {
            close.onclick = function() {
                var div = this.parentElement;
                div.style.opacity = "0";
                setTimeout(function() {
                    div.style.display = "none";
                }, 600);
            }
        }

        var tokenSession = '<?php echo $_SESSION['token']; ?>';
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

        var requestOptions = {
            method: "PATCH",
            headers: myHeaders,
            body: urlencoded,
            redirect: "follow",
        };
        fetch(
                "https://api.klubaderai.com/api/pakets" + "/" + id,
                requestOptions
            )
            .then((response) => response.text())
            .then((result => {
                myalert.style.display = 'block'
            }))
            .catch((error => {
                console.log(error)
            }));
    }
</script>