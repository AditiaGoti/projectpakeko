<style>
    .profile-card{
            position:relative;
            overflow: hidden;
            margin-top:-150px;
            box-shadow:0px 2px 3px #222;
            top:150px;
        }
        .profile-card:hover .profile-img img
        {
            transform: scale(1.2);
        }
        .profile-card .profile-img img{
            width:100%;
            height:auto;
            transition: transform 1s;
            
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
                            <div class="form-group">
                                <label>QR Code Value</label>
                                <input id="id_member" type="text" class="form-control form-control-lg" aria-label="name" required />
                            </div>
                            <div class="form-group">
                                        <label>Name</label>
                                        <input id="member_name" type="text" class="form-control form-control-lg" placeholder="Masukan Nama Member" aria-label="name" required /></div>
                            <div class="form-group">
                                        <label>Date of Birth</label>
                                        <input id="member_dob" type="date" class="form-control form-control-lg" placeholder="Masukan Tanggal Lahir Member" aria-label="dob" required />
                            </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
            <div class="profile-card">
                <div class="profile-img">
                    <img src="assets/images/logoo.png" alt="Team Image"/></div></div></div></div>

                            <button onclick="daftarKehadiran()" type="button" class="btn btn-inverse-success btn-sm">
                                Submit
                            </button>
                            <button type="button" onclick="window.location.href='/'" class="btn btn-inverse-dark btn-sm">Cancel</button>
                        </form>

                        <script>
                            $("#btn").click(function() {

                                $('<div class="alert alert-success">' +
                                    '<button type="button" class="close" data-dismiss="alert">' +
                                    '&times;</button>Data Berhasil Disimpan</div>').hide().prependTo('#form_kehadiran').fadeIn(1000);

                                $(".alert").delay(3000).fadeOut(
                                    "normal",
                                    function() {
                                        $(this).remove();
                                    });

                            });
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

                                        var data = JSON.parse(result);
                                        var hasildata = data.success;
                                        var message = data.errors;
                                        document.getElementById("form_kehadiran").reset();
                                        if (hasildata) {
                                            $('<div class="alert alert-success">' +
                                                '<button type="button" class="close" data-dismiss="alert">' +
                                                '&times;</button>Data Berhasil Disimpan</div>').hide().prependTo('#form_kehadiran').fadeIn(1000);

                                            $(".alert").delay(3000).fadeOut(
                                                "normal",
                                                function() {
                                                    $(this).remove();
                                                });
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