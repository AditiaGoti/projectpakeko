<div class="main-panel">
    <div class="content-wrapper">
        <div class="row page-title-header">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title">Merubah Member Klub Ade Rai</h4>
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
                        <form onsubmit="updateProfile(); return false" id="form_member" class="form sample">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input id="member_email" disabled type="email" class="form-control form-control-lg" placeholder="Masukan Email member" aria-label="email" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input id="member_name" type="text" class="form-control form-control-lg" placeholder="Masukan Nama member" aria-label="name" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Place of Birth</label>
                                        <input id="member_pob" type="text" class="form-control form-control-lg" placeholder="Masukan Tempat Lahir member" aria-label="pob" required />
                                    </div>

                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Date of Birth</label>
                                        <input id="member_dob" type="date" class="form-control form-control-lg" placeholder="Masukan Tanggal Lahir member" aria-label="dob" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="text" id="member_nohp" class="form-control form-control-lg" placeholder="Masukan No. Telepon member" aria-label="pnumber" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" id="member_address" class="form-control form-control-lg" placeholder="Masukan Alamat member" aria-label="adress" required />
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success mr-3">
                                Submit
                            </button>
                            <button class="btn btn-danger">Cancel</button>
                        </form>

                        <script>
                            var myArray = [];
                            var tokenSession = '<?php echo $_SESSION['token']; ?>';
                            var token = "Bearer" + " " + tokenSession;
                            var memID = sessionStorage.getItem("id-member");
                            // var id = `<?php echo $_SESSION['id']; ?>`;
                            var form = document.getElementById("form_member");
                            const url = "https://api.klubaderai.com/api/users" + "/" + memID;

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

                                name.value = data.name;
                                pob.value = data.tempat_lahir;
                                dob.value = data.tanggal_lahir;
                                email.value = data.email;
                                nohp.value = data.nohp;
                                alamat.value = data.alamat;
                            }
                        </script>

                        <script>
                            function updateProfile() {
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

                                var tokenSession = '<?php echo $_SESSION['token']; ?>';
                                var token = "Bearer" + " " + tokenSession;
                                var myHeaders = new Headers();
                                const url = "https://api.klubaderai.com/api/users" + "/" + memID;
                                myHeaders.append("Authorization", token);
                                myHeaders.append("Content-Type", "application/x-www-form-urlencoded");

                                var urlencoded = new URLSearchParams();

                                urlencoded.append(
                                    "name",
                                    document.getElementById("member_name").value
                                );
                                urlencoded.append(
                                    "tempat_lahir",
                                    document.getElementById("member_pob").value
                                );
                                urlencoded.append(
                                    "tanggal_lahir",
                                    document.getElementById("member_dob").value
                                );
                                urlencoded.append(
                                    "nohp",
                                    document.getElementById("member_nohp").value
                                );
                                urlencoded.append(
                                    "alamat",
                                    document.getElementById("member_address").value
                                );

                                var requestOptions = {
                                    method: "PATCH",
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
                                        myalert.style.display = 'block'
                                        document.getElementById("form_member").reset();
                                    }))
                                    .catch((error => {
                                        alertfailed();
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