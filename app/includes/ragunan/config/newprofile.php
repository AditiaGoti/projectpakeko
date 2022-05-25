<style>
    h6 {
        font-size: 14px
    }

    .card .card-block p {
        line-height: 25px
    }
</style>



<div class="main-panel">
    <div class="content-wrapper">
        <div class="row page-title-header">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title">Profile</h4>
                </div>
            </div>
        </div>
        <div class="padding" style="padding: 3rem !important; ">
            <div class="row container d-flex justify-content-center">
                <div class="col-xl-6 col-md-12">
                    <div class="card user-card-full">
                        <div class="row m-l-0 m-r-0">
                            <div class="col-sm-4 bg-c-lite-green user-profile" style="background-image:url(assets/images/BGPhoto.png); background-size:auto;  background-repeat:repeat-x;">
                                <div class="card-block text-center text-white">
                                    <div id="img" class="m-b-25" style="margin-top:25px">

                                    </div>

                                    <p id="member" style="display:block; font-family: 'League Gothic', sans-serif; font-size:20px; background: linear-gradient(to right, yellow,white);-webkit-background-clip:text;
                                      -webkit-text-fill-color: transparent;font-style: italic;">Member</p>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="card-block" style="padding: 1.25rem;">
                                    <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p id="email" class="m-b-10 f-w-600">Email</p>
                                        </div>
                                        <div class="col-sm-6">
                                            <p id="pob" class="m-b-10 f-w-600">Place of Birth</p>
                                        </div>
                                        <div class="col-sm-6">
                                            <p id="dob" class="m-b-10 f-w-600">Date Of birth</p>
                                        </div>
                                        <div class="col-sm-6">
                                            <p id="nohp" class="m-b-10 f-w-600">Phone Number</p>
                                        </div>
                                        <div class="col-sm-6">
                                            <p id="alamat" class="m-b-10 f-w-600">Address</p>
                                        </div>
                                        <div class="col-sm-6">
                                            <p id="gender" class="m-b-10 f-w-600">Gender</p>
                                        </div>
                                        <div class="col-sm-6">
                                            <p id="token" class="m-b-10 f-w-600">Token</p>
                                        </div>
                                        <div class="col-sm-6">
                                            <p id="body_cat" class="m-b-10 f-w-600">Body Category</p>
                                        </div>
                                    </div>
                                    <div class="buttonupdate">
                                        <button id="EPMember" style=" display: block; margin-left: 340px;  margin-top: 40px;" class="btn btn-inverse-info btn-fw" onclick="window.location.href='/ragunan/editprofile-member'">Edit Profile</button>
                                    </div>
                                    <div class="buttoncp">

                                        <button id="CPMember" style="display: block;float:right; margin-top: -29px;" class="btn btn-inverse-warning btn-fw" onclick="window.location.href='/ragunan/changepass-member'">Change Password</button>
                                    </div>
                                </div>
                            </div>

                            <script>
                                var myArray = [];
                                var tokenSession = '<?php echo $_SESSION['token']; ?>';
                                var token = "Bearer" + " " + tokenSession;
                                var id = `<?php echo $_SESSION['id']; ?>`;
                                const url = "https://ragunan.tms-klar.com/api/users" + "/" + id + "-ragunan";

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

                                    img = "https://ragunan.tms-klar.com/" +
                                        data.img_path;

                                    name = data.name;
                                    pob = data.tempat_lahir;
                                    dob = data.tanggal_lahir;
                                    email = data.email;
                                    nohp = data.nohp;
                                    alamat = data.alamat;
                                    gender = data.gender;
                                    token = data.token;

                                    $(`<img src="${img}" style="width: 200px; height: 200px;" class="img-radius" alt="User-Profile-Image">`).appendTo('#img');
                                    $(`<h6 class="text-muted f-w-400">${email}</h6>`).appendTo('#email');
                                    $(`<h6 class="text-muted f-w-400">${pob}</h6>`).appendTo('#pob');
                                    $(`<h6 class="text-muted f-w-400">${dob}</h6>`).appendTo('#dob');
                                    $(`<h6 class="text-muted f-w-400">${nohp}</h6>`).appendTo('#nohp');
                                    $(`<h6 class="text-muted f-w-400">${alamat}</h6>`).appendTo('#alamat');
                                    $(`<h6 class="text-muted f-w-400">${gender}</h6>`).appendTo('#gender');
                                    $(`<h6 class="text-muted f-w-400">${token}</h6>`).appendTo('#token');
                                    $(` <h7 style="font-size: 40px;font-family: 'League Gothic', sans-serif;background: linear-gradient(to right, yellow,white);-webkit-background-clip:text;
                                      -webkit-text-fill-color: transparent;" class="f-w-600">${name}</h7></br></br>`).prependTo('#member');
                                }
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="ModalCowo" class="modal fade">
            <div class="modal-dialog modal-lg modal-dialog-centered" style="width: 350px;" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">MESSAGE</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="formCowo">
                            <input type="hidden" name="_token">
                            <div class="col">
                                <div class="form-group">
                                    <label class="control-label">Berat Badan</label>
                                    <div>
                                        <input id="coberat" type="text" class="form-control input-sm" style="width: 200px;" name="berat"> kg
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Tinggi Badan</label>
                                    <div>
                                        <input id="cotinggi" type="text" class="form-control input-sm" style="width: 200px;" name="tinggi">cm
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="control-label">Lingkar Leher</label>
                                    <div>
                                        <input id="coleher" type="text" class="form-control input-sm" style="width: 200px;" name="massaotot"> cm
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Lingkar Pinggang</label>
                                    <div>
                                        <input id="copinggang" type="text" class="form-control input-sm" style="width: 200px;" name="presentasilemak"> cm
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <div class="form-group">
                            <div>
                                <button onclick="proCowo(); return false" type="submit" class="btn btn-success">
                                    Submit
                                </button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                    <script>
                        function proCowo() {
                            var tokenSession = '<?php echo $_SESSION['token']; ?>';
                            var token = "Bearer" + " " + tokenSession;
                            var myHeaders = new Headers();
                            myHeaders.append("Authorization", token);
                            myHeaders.append("Content-Type", "application/x-www-form-urlencoded");

                            var urlencoded = new URLSearchParams();
                            urlencoded.append("tinggi_badan", document.getElementById("cotinggi").value);
                            urlencoded.append("berat_badan", document.getElementById("coberat").value);
                            urlencoded.append("leher", document.getElementById("coleher").value);
                            urlencoded.append("pinggang", document.getElementById("copinggang").value);

                            var requestOptions = {
                                method: 'POST',
                                headers: myHeaders,
                                body: urlencoded,
                                redirect: 'follow'
                            };

                            fetch("https://ragunan.tms-klar.com/api/users-progress", requestOptions)
                                .then(response => response.text())
                                .then(result => {
                                    var data = JSON.parse(result);
                                    var hasildata = data.success;
                                    var message = data.message;

                                    if (hasildata) {
                                        $('<div class="alert alert-success">' +
                                            '<button type="button" class="close" data-dismiss="alert">' +
                                            '&times;</button>Data Berhasil Disimpan</div>').hide().prependTo('#formCowo').fadeIn(1000);

                                        $(".alert").delay(3000).fadeOut(
                                            "normal",
                                            function() {
                                                $(this).remove();
                                            });
                                        location.reload();
                                    } else {
                                        $('<div class="alert alert-danger">' +
                                            '<button type="button" class="close" data-dismiss="alert">' +
                                            `&times;</button>${message}</div>`).hide().prependTo('#formCowo').fadeIn(1000);

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
                                        `&times;</button>${error}</div>`).hide().prependTo('#formCowo').fadeIn(1000);

                                    $(".alert").delay(3000).fadeOut(
                                        "normal",
                                        function() {
                                            $(this).remove();
                                        });
                                });
                        }

                        function proCewe() {

                            var tokenSession = '<?php echo $_SESSION['token']; ?>';
                            var token = "Bearer" + " " + tokenSession;
                            var myHeaders = new Headers();
                            myHeaders.append("Authorization", token);
                            myHeaders.append("Content-Type", "application/x-www-form-urlencoded");

                            var urlencoded = new URLSearchParams();
                            urlencoded.append("berat_badan", document.getElementById("ceberat").value);
                            urlencoded.append("tinggi_badan", document.getElementById("cetinggi").value);
                            urlencoded.append("leher", document.getElementById("celeher").value);
                            urlencoded.append("pinggang", document.getElementById("cepinggang").value);
                            urlencoded.append("paha", document.getElementById("cepaha").value);

                            var requestOptions = {
                                method: 'POST',
                                headers: myHeaders,
                                body: urlencoded,
                                redirect: 'follow'
                            };

                            fetch("https://ragunan.tms-klar.com/api/users-progress", requestOptions)
                                .then(response => response.text())
                                .then(result => {
                                    var data = JSON.parse(result);
                                    var hasildata = data.success;
                                    var message = data.message;

                                    if (hasildata) {
                                        $('<div class="alert alert-success">' +
                                            '<button type="button" class="close" data-dismiss="alert">' +
                                            '&times;</button>Data Berhasil Disimpan</div>').hide().prependTo('#formCewe').fadeIn(1000);

                                        $(".alert").delay(3000).fadeOut(
                                            "normal",
                                            function() {
                                                $(this).remove();
                                            });
                                        document.getElementById("formCewe").reset();
                                    } else {
                                        $('<div class="alert alert-danger">' +
                                            '<button type="button" class="close" data-dismiss="alert">' +
                                            `&times;</button>${message}</div>`).hide().prependTo('#formCewe').fadeIn(1000);

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
                                        `&times;</button>${error}</div>`).hide().prependTo('#formCewe').fadeIn(1000);

                                    $(".alert").delay(3000).fadeOut(
                                        "normal",
                                        function() {
                                            $(this).remove();
                                        });
                                });
                        }
                    </script>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
        <div id="ModalCewe" class="modal fade">
            <div class="modal-dialog modal-lg modal-dialog-centered" style="width: 350px;" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">MESSAGE</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="formCewe">
                            <input type="hidden" name="_token">
                            <div class="form-group">
                                <label class="control-label">Berat Badan (kg) </label>
                                <div>
                                    <input id="ceberat" type="text" class="form-control input-sm" style="width: 200px;" name="berat">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Tinggi Badan (cm) </label>
                                <div>
                                    <input id="cetinggi" type="text" class="form-control input-sm" style="width: 200px;" name="tinggi">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Lingkar Leher (cm) </label>
                                <div>
                                    <input id="celeher" type="text" class="form-control input-sm" style="width: 200px;" name="massaotot">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Lingkar Pinggang (cm)</label>
                                <div>
                                    <input id="cepinggang" type="text" class="form-control input-sm" style="width: 200px;" name="presentasilemak">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Lingkar Paha</label><label>(cm)</label>
                                <div>
                                    <input type="cetext" class="form-control input-sm" style="width: 200px;" name="massalemak">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <div class="form-group">
                            <div>
                                <button onclick="proCowo(); return false" type="button" class="btn btn-success">
                                    Submit
                                </button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card" style="background: linear-gradient(0.2deg, #BDB76B 40%, white);box-shadow: none;border-radius:7px;">
                <div class="modal-header">
                    <h4 id="btnCowo" class="card-title mb-0" style="display:none;font-size: 24px;">Progress<button type="button" class="btn btn-inverse-primary btn-sm" style="margin-left: 10px;" data-toggle="modal" data-target="#ModalCowo"><i class="fa fa-plus" aria-hidden="true"></i></button></h4>
                    <h4 id="btnCewe" class="card-title mb-0" style="display:none;font-size: 24px;">Progress<button type="button" class="btn btn-inverse-primary btn-sm" style="margin-left: 10px;" data-toggle="modal" data-target="#ModalCewe"><i class="fa fa-plus" aria-hidden="true"></i></button></h4>
                </div>
                <script>
                    var gender = '<?php echo $_SESSION['gender']; ?>'
                    if (gender == 'male') {
                        var btnAdd = document.getElementById("btnCowo")
                        btnAdd.style.display = 'block'
                    } else if (gender == 'female') {
                        var btnAdd = document.getElementById("btnCewe")
                        btnAdd.style.display = 'block'
                    }
                </script>
                <div class="row px-3" style="padding-top: 10px;">
                    <div class="col-lg-6 mb-4">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body" style="background: linear-gradient(10deg,  smokewhite 10%, white);box-shadow: none;border-radius:7px;">
                                <div id="sumMember" class="col">
                                    <h5 class="card-title text-uppercase mb-0" style="text-align: left; font-size: 20px; padding-bottom: 10px;font-family: 'Anton', sans-serif;background:#663300;-webkit-background-clip:text;
                                      -webkit-text-fill-color: transparent;font-weight: bold;">Before</h5>
                                </div>
                                <div class="row">
                                    <div class=" col-md-6 mb-2">
                                        <div class="card card-stats">
                                            <div class="card-body" style=" background: linear-gradient(10deg, #331900 30%, white);border-radius:7px;">
                                                <div id="sumMember" class="col">
                                                    <p style="font-size:15px;font-family: 'League Gothic', sans-serif;font-weight: bold; margin-left: 10px;">Berat Badan</h5>
                                                    <P id="beforeBerat"></P>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <div class="card card-stats">
                                            <div class="card-body" style=" background: linear-gradient(10deg, #331900 30%, white);border-radius:7px; ">
                                                <div id="sumMember" class="col">
                                                    <p style="font-size:15px;font-family: 'League Gothic', sans-serif;font-weight: bold; margin-left: 15px;">Massa Otot</p>
                                                    <P id="beforeMassaO"></P>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <div class="card card-stats">
                                            <div class="card-body" style=" background: linear-gradient(10deg, #331900 30%, white);border-radius:7px; ">
                                                <div id="sumMember" class="col">
                                                    <p style="font-size:15px;font-family: 'League Gothic', sans-serif;font-weight: bold; margin-left: 15px;;">Berat Otot</p>
                                                    <P id="beforeOtot"></P>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" col-md-6">
                                        <div class="card card-stats">
                                            <div class="card-body" style=" background: linear-gradient(10deg, #331900 30%, white);border-radius:7px; ">
                                                <div id="sumMember" class="col">
                                                    <p style="font-size:15px;font-family: 'League Gothic', sans-serif;font-weight: bold; margin-left: 10px;">Massa Lemak</p>
                                                    <P id="beforeMassaL"></P>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-4">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body" style=" background: linear-gradient(10deg, smokewhite 10%, white);box-shadow: none; border-radius:7px; ">
                                <div id="sumMember" class="col">
                                    <h5 class="card-title text-uppercase mb-0" style="text-align: left; font-size: 20px; padding-bottom: 10px;font-family: 'Anton', sans-serif;background:#663300;-webkit-background-clip:text;
                                      -webkit-text-fill-color: transparent;font-weight: bold;">After</h5>
                                </div>
                                <div class="row">
                                    <div class=" col-md-6 mb-2">
                                        <div class="card card-stats">
                                            <div class="card-body" style=" background: linear-gradient(10deg, #331900 30%, white);border-radius:7px; ">
                                                <div id="sumMember" class="col">
                                                    <p style="font-size:15px;font-family: 'League Gothic', sans-serif;font-weight: bold; margin-left: 10px;">Berat Badan</p>
                                                    <P id="afterBerat"></P>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <div class="card card-stats">
                                            <div class="card-body" style=" background: linear-gradient(10deg, #331900 30%, white);border-radius:7px; ">
                                                <div id="sumMember" class="col">
                                                    <p style="font-size:15px;font-family: 'League Gothic', sans-serif;font-weight: bold; margin-left: 15px;">Massa Otot</p>
                                                    <P id="afterMassaO"></P>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <div class="card card-stats">
                                            <div class="card-body" style=" background: linear-gradient(10deg, #331900 30%, white);border-radius:7px; ">
                                                <div id="sumMember" class="col">
                                                    <p style="font-size:15px;font-family: 'League Gothic', sans-serif;font-weight: bold; margin-left: 15px;">Berat Otot</p>
                                                    <P id="afterOtot"></P>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" col-md-6">
                                        <div class="card card-stats">
                                            <div class="card-body" style=" background: linear-gradient(10deg, #331900 30%, white);border-radius:7px; ">
                                                <div id="sumMember" class="col">
                                                    <p style="font-size:15px;font-family: 'League Gothic', sans-serif;font-weight: bold; margin-left: 10px;">Massa Lemak</p>
                                                    <P id="afterMassaL"></P>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 mb-4">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div style="background: linear-gradient(10deg, whitesmoke 30%, white);box-shadow: none;border:0.1 solid transparent;">
                                <div class="card-body">
                                    <canvas height="200px" id="kgChart"></canvas>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-4">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div style="background: linear-gradient(10deg, whitesmoke 30%, white);box-shadow: none; border:0.1 solid transparent">
                                <div class="card-body">
                                    <canvas height="200px" id="gChart"></canvas>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const loader = document.querySelector("#loading");

        function displayLoading() {
            loader.classList.add("loading");
            setTimeout(() => {
                loader.classList.remove("loading");
            }, 8000);
        }
        displayLoading()

        function hideLoading() {
            loader.classList.remove("loading");
        }
        var tokenSession = '<?php echo $_SESSION['token']; ?>';
        var token = "Bearer" + " " + tokenSession;
        var myArray = [];
        const urlt = "https://ragunan.tms-klar.com/api/users-progress";
        var myArray = [];
        $(document).ready(function() {
            $.ajax({
                method: "GET",
                url: urlt,
                headers: {
                    Authorization: token,
                },
                success: function(response) {
                    data = response.data;
                    hideLoading()
                    bf = JSON.stringify(data.body_fat);
                    w = JSON.stringify(data.weight);
                    lm = JSON.stringify(data.leanmass);
                    fm = JSON.stringify(data.fatmass);
                    var databf = JSON.parse(bf);
                    var dataw = JSON.parse(w);
                    var datalm = JSON.parse(lm);
                    var datafm = JSON.parse(fm);

                    body_cat = data.body_cat;
                    $(`<h6 class="text-muted f-w-400">${body_cat}</h6>`).appendTo('#body_cat');

                    $(`<P style="font-size:22px;font-family: 'League Gothic', sans-serif;margin-top:-15px; font-weight: bold; margin-left: 20px;color: #FFB266;"><i class="fa-solid fa-weight-scale fa-beat-fade" style="--fa-beat-fade-opacity: 0.67; --fa-beat-fade-scale: 1.075;margin-left: -15px; padding-right: 10px;">
                </i>${dataw[1]} kg</P>
                    `).appendTo('#beforeBerat');
                    $(`<P style="font-size:22px;font-family: 'League Gothic', sans-serif;margin-top:-15px;font-weight: bold; margin-left: 10px;color: #FFB266;"><i class="fa-solid fa-weight-scale fa-beat-fade" style="--fa-beat-fade-opacity: 0.67; --fa-beat-fade-scale: 1.075;margin-left: -20px;padding-right:5px;">
                </i>${data.fatmass[1]} kg</P>
                    `).appendTo('#beforeMassaO');
                    $(`<P style="font-size:22px;font-family: 'League Gothic', sans-serif;margin-top:-15px;font-weight: bold;color:#FFB266; margin-left:7px"><i class="fa-solid fa-weight-scale fa-beat-fade" style="--fa-beat-fade-opacity: 0.67; --fa-beat-fade-scale: 1.075;margin-left: -18px; padding-right: 5px;color:#FFB266;">
                </i>${data.leanmass[1]} kg</P>
                    `).appendTo('#beforeOtot');
                    $(`<P style="font-size:22px;font-family: 'League Gothic', sans-serif;margin-top:-15px;font-weight: bold;color: #FFB266; margin-left:20px">
                ${data.body_fat[1]}<i class="fa-solid fa-percent fa-beat-fade" style="--fa-beat-fade-opacity: 0.67; --fa-beat-fade-scale: 1.075;margin-left: 10px;color:#FFB266;"></i></P>
                    `).appendTo('#beforeMassaL');

                    $(`<P style="font-size:22px;font-family: 'League Gothic', sans-serif;margin-top:-20px; font-weight: bold; margin-left: 20px;color: #FFB266;"><i class="fa-solid fa-weight-scale fa-beat-fade" style="--fa-beat-fade-opacity: 0.67; --fa-beat-fade-scale: 1.075;margin-left: -18px; padding-right: 2px;color:#FFB266;">
                </i> ${data.weight[0]} kg</P>
                                        `).appendTo('#afterBerat');
                    $(`<P style="font-size:22px;font-family: 'League Gothic', sans-serif;margin-top:-15px;font-weight: bold; margin-left: 10px;color: #FFB266;"><i class="fa-solid fa-weight-scale fa-beat-fade" style="--fa-beat-fade-opacity: 0.67; --fa-beat-fade-scale: 1.075;margin-left: -20px ;color:#FFB266;">
                </i> ${data.fatmass[0]} kg</P>
                                        `).appendTo('#afterMassaO');
                    $(`<P style="font-size:22px;font-family: 'League Gothic', sans-serif;margin-top:-15px;font-weight: bold;color: #FFB266;margin-left: 7px"><i class="fa-solid fa-weight-scale fa-beat-fade" style="--fa-beat-fade-opacity: 0.67; --fa-beat-fade-scale: 1.075;margin-left: -18px; padding-right: 10px;color:#FFB266;">
                </i>${data.leanmass[0]} kg</P>
                                        `).appendTo('#afterOtot');
                    $(`<P style="font-size:22px;font-family: 'League Gothic', sans-serif;margin-top:-15px;font-weight: bold;color: #FFB266; margin-left:20px;">
                ${data.body_fat[0]}<i class="fa-solid fa-percent fa-beat-fade" style="--fa-beat-fade-opacity: 0.67; --fa-beat-fade-scale: 1.075;margin-left: 10px; padding-right: 10px;color:#FFB266;"></i></P>
                                        `).appendTo('#afterMassaL');


                    var arraybf = [];
                    for (var i in databf)
                        arraybf.push(databf[i]);

                    var arrayw = [];
                    for (var i in dataw)
                        arrayw.push(dataw[i]);

                    var arraylm = [];
                    for (var i in datalm)
                        arraylm.push(datalm[i]);

                    var arrayfm = [];
                    for (var i in datafm)
                        arrayfm.push(datafm[i]);



                    function chartkg(data) {

                        const labels =
                            data.time;

                        const datasets = {
                            labels: labels,
                            datasets: [{
                                label: 'Weight',
                                backgroundColor: 'rgb(253, 89, 1, 0.5)',
                                borderColor: 'rgb(253, 89, 1)',
                                borderWidth: 2,
                                borderRadius: 5,
                                borderSkipped: false,
                                data: arrayw

                            }, {
                                label: 'Leanmass',
                                backgroundColor: 'rgb(250, 171, 54, 0.5)',
                                borderColor: 'rgb(250, 171, 54)',
                                borderWidth: 2,
                                borderRadius: 5,
                                borderSkipped: false,
                                data: arraylm

                            }, {
                                label: 'Fatmass',
                                backgroundColor: 'rgb(0, 128, 131, 0.5)',
                                borderColor: 'rgb(0, 128, 131)',
                                borderWidth: 2,
                                borderRadius: 5,
                                borderSkipped: false,
                                data: arrayfm

                            }]
                        };

                        const config = {
                            type: 'bar',
                            data: datasets,
                            options: {
                                responsive: true,
                                title: {
                                    display: true,
                                    text: 'Body Measurements (kg)'
                                },
                                plugins: {
                                    legend: {
                                        position: 'top',
                                    },
                                },

                            },
                        };
                        const myChart = new Chart(
                            document.getElementById('kgChart'),
                            config
                        );
                    }


                    function chartpersen(data) {

                        const labels = data.time;

                        const datasets = {
                            labels: labels,
                            datasets: [{
                                label: 'Body Fat',
                                backgroundColor: 'rgb(0, 95, 96, 0.5)',
                                borderColor: 'rgb(0, 95, 96)',
                                borderWidth: 2,
                                borderRadius: 5,
                                borderSkipped: false,
                                data: arraybf

                            }]
                        };

                        const config = {
                            type: 'line',
                            data: datasets,
                            options: {
                                responsive: true,
                                title: {
                                    display: true,
                                    text: 'Body Fat Percentage (%)'
                                },
                                plugins: {
                                    legend: {
                                        position: 'top',
                                    },
                                },
                                scales: {
                                    yAxes: [{
                                        display: true,
                                        stacked: true,
                                        ticks: {
                                            min: 0, // minimum value
                                            max: 100 // maximum value
                                        }
                                    }]
                                }
                            },
                        };
                        const myChart = new Chart(
                            document.getElementById('gChart'),
                            config
                        );
                    }

                    chartkg(data);
                    chartpersen(data);
                },
                error: function() {
                    alert('Terjadi Kesalahan');

                }
            });

        });
    </script>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
    <footer class="footer">
        <div class="container-fluid clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2022. All Rights Reserved</span>
        </div>
    </footer>
    <!-- partial -->
</div>