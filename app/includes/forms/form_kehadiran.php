<div class="main-panel">
    <div class="content-wrapper">
        <div class="row page-title-header">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title">Menambahkan Kehadiran Member Klub Ade Rai</h4>
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
                        <form onsubmit="daftarKehadiran();return false" id="form_kehadiran" class="form sample">
                            <div class="form-group">
                                <label>QR Code Value</label>
                                <input id="id_member" type="text" class="form-control form-control-lg" aria-label="name" required />
                            </div>
                            <button onclick="daftarKehadiran()" type="button" class="btn btn-inverse-success btn-sm">
                                Submit
                            </button>
                            <button type="button" onclick="window.location.href='/'" class="btn btn-inverse-dark btn-sm">Cancel</button>
                        </form>

                        <script>
                            var myalert = document.getElementById("alert");
                            var failalert = document.getElementById("alertfail");
                            var close = document.getElementsByClassName("close");
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
                                        myalert.style.display = 'block'
                                        document.getElementById("form_kehadiran").reset();
                                    }))
                                    .catch((error => {
                                        failalert.style.display = 'none'
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