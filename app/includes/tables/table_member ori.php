<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.2/xlsx.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row page-title-header">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title">Data Member
                        <button id="btnLap" data-toggle="modal" data-target="#modalLaporan" style="float:right; margin-left:5px;" type="submit" class="btn btn-outline-warning btn-sm">Laporan Member</button>
                        <button id="btnAddowMember" style="float:right; margin-left:5px; display: none;" type="submit" class="btn btn-inverse-primary btn-sm" onclick="window.location.href='/owform_member'">Tambah</button>
                        <button id="btnAddMember" style="float:right; margin-left:5px; display: none;" type="submit" class="btn btn-inverse-primary btn-sm" onclick="window.location.href='/form_member'">Tambah</button>
                    </h4>
                    <script>
                        var type = '<?php echo $_SESSION['type']; ?>'
                        if (type == 2) {
                            var btnAdd = document.getElementById("btnAddowMember")
                            btnAdd.style.display = 'block'

                        } else {
                            var btnAdd = document.getElementById("btnAddMember")
                            btnAdd.style.display = 'block'
                        }
                    </script>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModalCenteru" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Message</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="bodyu">
                        Anda Yakin Akan Hapus Data Ini?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" onclick="deleteDatau()" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModalCenterua" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Message</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="bodyua">
                        Anda Yakin Akan Hapus Data Ini?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" onclick="deleteDataua()" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModalCenterui" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Message</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="bodyui">
                        Anda Yakin Akan Hapus Data Ini?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" onclick="deleteDataui()" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade " id="modalLaporan">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Message</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5>Masukan Tanggal Laporan</h5>
                        <input id="startDate" type="date"> s/d
                        <input id="endDate" type="date">
                        <button type="button" onclick="checkDate()" style="margin-top: -1px;" class="btn btn-outline-primary"><i style="margin: -1px;" class="fa fa-search"></i></button>
                        <button type="button" onclick="print()" style="margin-top: -1px;" class="btn btn-outline-info"><i style="margin: -1px;" class="fa fa-print"></i></button>
                        <hr>
                        <script>
                            function checkDate() {
                                var tokenSession = '<?php echo $_SESSION['token']; ?>';
                                var token = "Bearer" + " " + tokenSession;
                                var myArray = [];
                                var dataLaporan = document.getElementById("dataLaporan");
                                const urlTE = "https://api.klubaderai.com/api/users-export";

                                var myHeaders = new Headers();
                                myHeaders.append(
                                    "Authorization",
                                    token);
                                var deleteRequest = {
                                    method: "POST",
                                    headers: myHeaders,
                                    redirect: "follow",
                                };

                                var urlencoded = new URLSearchParams();
                                urlencoded.append("start_date", document.getElementById("startDate").value);
                                urlencoded.append("end_date", document.getElementById("endDate").value);

                                var requestOptions = {
                                    method: 'POST',
                                    headers: myHeaders,
                                    body: urlencoded,
                                    redirect: 'follow'

                                };

                                fetch(urlTE, requestOptions)
                                    .then(response => response.text())
                                    .then((result => {
                                        var data = JSON.parse(result);
                                        var hasildata = data.success;
                                        var message = data.message;
                                        var totTrans = data.total;
                                        var tot = document.getElementById("totTrans");

                                        tot.value = totTrans;
                                    }))
                                    .catch(error => console.log('error', error));
                            }

                            function print(result) {

                                var tokenSession = '<?php echo $_SESSION['token']; ?>';
                                var token = "Bearer" + " " + tokenSession;
                                var myArray = [];
                                var dataLaporan = document.getElementById("dataLaporan");
                                const urlTE = "https://api.klubaderai.com/api/users-export";

                                var myHeaders = new Headers();
                                myHeaders.append(
                                    "Authorization",
                                    token);
                                var deleteRequest = {
                                    method: "POST",
                                    headers: myHeaders,
                                    redirect: "follow",
                                };

                                var urlencoded = new URLSearchParams();
                                urlencoded.append("start_date", document.getElementById("startDate").value);
                                urlencoded.append("end_date", document.getElementById("endDate").value);

                                var requestOptions = {
                                    method: 'POST',
                                    headers: myHeaders,
                                    body: urlencoded,
                                    redirect: 'follow'

                                };

                                fetch(urlTE, requestOptions)
                                    .then(response => response.text())
                                    .then((result => {
                                        var dataparse = JSON.parse(result);
                                        var hasil = dataparse.success;
                                        var message = dataparse.message;

                                        var data = dataparse.data;
                                        var createXLSLFormatObj = [];
                                        var xlsHeader = ["ID", "Name", "Email", "Gender", "Tempat Lahir", "Tanggal Lahir", "No. HP", "Alamat", "Expired Date", "Token"];

                                        createXLSLFormatObj.push(xlsHeader);
                                        $.each(data, function(i, data) {
                                            /* XLS Rows Data */
                                            var xlsRows = [{

                                                "ID": data.id,
                                                "Name": data.name,
                                                "Email": data.email,
                                                "Gender": data.gender,
                                                "Tempat Lahir": data.tempat_lahir,
                                                "Tanggal Lahir": data.tanggal_lahir,
                                                "No. HP": data.nohp,
                                                "Alamat": data.alamat,
                                                "Expired Date": data.expired,
                                                "Token": data.token,
                                            }];

                                            $.each(xlsRows, function(i, data) {
                                                var innerRowData = [];
                                                $.each(data, function(i, data) {

                                                    innerRowData.push(data);
                                                });
                                                createXLSLFormatObj.push(innerRowData);
                                            });
                                        });
                                        var filename = "Member Data.xlsx";

                                        var ws_name = "Data Member";
                                        var wb = XLSX.utils.book_new(),
                                            ws = XLSX.utils.aoa_to_sheet(createXLSLFormatObj);

                                        XLSX.utils.book_append_sheet(wb, ws, ws_name);
                                        XLSX.writeFile(wb, filename);

                                    }))
                                    .catch(error => console.log('error', error));

                            }
                        </script>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Total Member: </label>
                                <input id="totTrans" disabled type="email" class="form-control " aria-label="email" style="margin-left: -2px;" />
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class=" col-lg-4 mb-4">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div id="sumMember" class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Member</h5>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                    <i class="fa fa-users"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div id="sumAktif" class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Member Aktif</h5>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                    <i class="fa fa-user"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div id="sumTAktif" class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Member Non-Aktif</h5>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                    <i class="fa fa-user-times"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                $(document).ready(function() {
                    $("#myTab a").each(function(index, element) {
                        new bootstrap.Tab(element);
                    })
                });
            </script>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab">
                            <li class="nav-item">
                                <a href="#allmember" class="nav-link active" data-bs-toggle="tab">All Member</a>
                            </li>
                            <li class="nav-item">
                                <a href="#activemember" class="nav-link" data-bs-toggle="tab">Active Member</a>
                            </li>
                            <li class="nav-item">
                                <a href="#inactivemember" class="nav-link" data-bs-toggle="tab">Inactive Member</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="allmember">
                                <div style="margin-top:10px;" class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="table-data">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Gender</th>

                                                <th>DOB</th>
                                                <th>No. HP</th>
                                                <th>Alamat</th>
                                                <th>Expired</th>
                                                <th>Token</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tableMember">
                                            <script>
                                                var tokenSession = '<?php echo $_SESSION['token']; ?>';
                                                var token = "Bearer" + " " + tokenSession;
                                                var type = '<?php echo $_SESSION['type']; ?>'
                                                var myArray = [];
                                                var tableMember = document.getElementById("tableMember");
                                                const urlu = "https://api.klubaderai.com/api/users";

                                                $(document).ready(function() {
                                                    $.ajax({
                                                        method: "GET",
                                                        url: urlu,
                                                        headers: {
                                                            Authorization: token,
                                                        },
                                                        success: function(response) {
                                                            data = response.data;
                                                            dat = response.etc;
                                                            member(dat);
                                                            memberaktif(dat);
                                                            membernon(dat);

                                                            function member(dat) {
                                                                var body = `<span class="h2 font-weight-bold mb-0">` + dat.total_member + " Orang" + `</span>`;
                                                                $("#sumMember").append(body);
                                                            };

                                                            function memberaktif(dat) {
                                                                var body = `<span class="h2 font-weight-bold mb-0">` + dat.total_member_active + " Orang" + `</span>`;
                                                                $("#sumAktif").append(body);
                                                            };

                                                            function membernon(dat) {
                                                                var body = `<span class="h2 font-weight-bold mb-0">` + dat.total_member_inactive + " Orang" + `</span>`;
                                                                $("#sumTAktif").append(body);
                                                            };

                                                            $.each(data, function(i, data) {

                                                                var body = `<tr data-id=${data.id}>`;
                                                                body += "<td>" + data.id + "</td>";
                                                                body += "<td>" + data.name + "</td>";
                                                                body += "<td>" + data.email + "</td>";
                                                                body += "<td>" + data.gender + "</td>";
                                                                body += "<td>" + data.tanggal_lahir + "</td>";
                                                                body += "<td>" + data.nohp + "</td>";
                                                                body += "<td>" + data.alamat + "</td>";
                                                                body += "<td>" + data.expired + "</td>";
                                                                body += "<td>" + data.token + "</td>";
                                                                body += "<td>" + `<button id="update" class="btn btn-warning" role="button"><i class=" fa fa-pencil"></i></button>` +
                                                                    " " +
                                                                    `<button id="delete" data-toggle="modal" data-target="#exampleModalCenteru" class="btn btn-danger" role="button"><i class="fa fa-trash"></i></button>` + "</td>";

                                                                body += "</tr>";
                                                                $("#table-data tbody").append(body);
                                                            });
                                                            /*DataTables instantiation.*/
                                                            $("#table-data").DataTable({
                                                                responsive: true,
                                                                "pageLength": 50

                                                            });
                                                        },
                                                        error: function(response) {
                                                            hasil = response.responseJSON.message;
                                                            alert(hasil);

                                                        }
                                                    });
                                                    tableMember.addEventListener("click", (e) => {
                                                        e.preventDefault();
                                                        let deleteButtonisPressed = e.target.id == "delete";
                                                        let updateButtonisPressed = e.target.id == "update";

                                                        mid = e.target.parentElement.parentElement.dataset.id;
                                                        if (updateButtonisPressed) {
                                                            if (type == 2) {
                                                                var memID = sessionStorage.setItem("id-member", mid);
                                                                location.href = "/owformu_member";
                                                            } else {
                                                                var memID = sessionStorage.setItem("id-member", mid);
                                                                location.href = "formu_member";
                                                            }
                                                        }
                                                    })

                                                });

                                                function deleteDatau() {
                                                    var myHeaders = new Headers();
                                                    myHeaders.append(
                                                        "Authorization",
                                                        token);
                                                    var deleteRequest = {
                                                        method: "Delete",
                                                        headers: myHeaders,
                                                        redirect: "follow",
                                                    };
                                                    fetch(`${urlu}/${mid}`, deleteRequest)
                                                        .then((res) => res.json())
                                                        .then((result => {

                                                            var hasildata = result.success;
                                                            var message = result.message;
                                                            if (hasildata) {
                                                                sessionStorage.removeItem("id-member");
                                                                location.reload();
                                                            } else {
                                                                $('<div class="alert alert-danger">' +
                                                                    '<button type="button" class="close" data-dismiss="alert">' +
                                                                    `&times;</button>${message}</div>`).hide().prependTo('#modal-bodyu').fadeIn(1000);

                                                                $(".alert").delay(3000).fadeOut(
                                                                    "normal",
                                                                    function() {
                                                                        $(this).remove();
                                                                    });
                                                            }
                                                        }))
                                                };
                                            </script>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="activemember">
                                <div style="margin-top:10px;" class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="table-dataa">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Gender</th>

                                                <th>DOB</th>
                                                <th>No. HP</th>
                                                <th>Alamat</th>
                                                <th>Expired</th>
                                                <th>Token</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tableMembera">
                                            <script>
                                                var tokenSession = '<?php echo $_SESSION['token']; ?>';
                                                var token = "Bearer" + " " + tokenSession;
                                                var myArray = [];
                                                var tableMembera = document.getElementById("tableMembera");
                                                const urlua = "https://api.klubaderai.com/api/users-active";
                                                $(document).ready(function() {
                                                    $.ajax({
                                                        method: "GET",
                                                        url: urlua,
                                                        headers: {
                                                            Authorization: token,
                                                        },
                                                        success: function(response) {
                                                            data = response.data;
                                                            $.each(data, function(i, data) {

                                                                var body = `<tr data-id=${data.id} >`;
                                                                body += "<td>" + data.id + "</td>";
                                                                body += "<td>" + data.name + "</td>";
                                                                body += "<td>" + data.email + "</td>";
                                                                body += "<td>" + data.gender + "</td>";
                                                                body += "<td>" + data.tanggal_lahir + "</td>";
                                                                body += "<td>" + data.nohp + "</td>";
                                                                body += "<td>" + data.alamat + "</td>";
                                                                body += "<td>" + data.expired + "</td>";
                                                                body += "<td>" + data.token + "</td>";
                                                                body += "<td>" +
                                                                    `<button id="update" class="btn btn-warning" role="button"><i class=" fa fa-pencil"></i></button>` +
                                                                    " " +
                                                                    `<button id="delete" data-toggle="modal" data-target="#exampleModalCenterua" class="btn btn-danger" role="button"><i class="fa fa-trash"></i></button>` +
                                                                    "</td>";
                                                                body += "</tr>";
                                                                $("#table-dataa tbody").append(body);
                                                            });
                                                            /*DataTables instantiation.*/
                                                            $("#table-dataa").DataTable({
                                                                responsive: true,
                                                                "pageLength": 50

                                                            });
                                                        },
                                                        error: function(response) {
                                                            hasil = response.responseJSON.message;
                                                            alert(hasil);

                                                        }
                                                    });
                                                    tableMembera.addEventListener("click", (e) => {
                                                        e.preventDefault();
                                                        let deleteButtonisPressed = e.target.id == "delete";
                                                        let updateButtonisPressed = e.target.id == "update";

                                                        midua = e.target.parentElement.parentElement.dataset.id;
                                                        if (updateButtonisPressed) {
                                                            if (type == 2) {
                                                                var memID = sessionStorage.setItem("id-member", midua);
                                                                location.href = "/owformu_member";
                                                            } else {
                                                                var memID = sessionStorage.setItem("id-member", midua);
                                                                location.href = "formu_member";
                                                            }
                                                        }
                                                    })
                                                });

                                                function deleteDataua() {
                                                    var myHeaders = new Headers();
                                                    myHeaders.append(
                                                        "Authorization",
                                                        token);
                                                    var deleteRequest = {
                                                        method: "Delete",
                                                        headers: myHeaders,
                                                        redirect: "follow",
                                                    };

                                                    fetch(`${urlu}/${midua}`, deleteRequest)
                                                        .then((res) => res.json())
                                                        .then((result => {

                                                            var hasildata = result.success;
                                                            var message = result.message;
                                                            if (hasildata) {
                                                                sessionStorage.removeItem("id-member");
                                                                location.reload();
                                                            } else {
                                                                $('<div class="alert alert-danger">' +
                                                                    '<button type="button" class="close" data-dismiss="alert">' +
                                                                    `&times;</button>${message}</div>`).hide().prependTo('#modal-bodyua').fadeIn(1000);

                                                                $(".alert").delay(3000).fadeOut(
                                                                    "normal",
                                                                    function() {
                                                                        $(this).remove();
                                                                    });
                                                            }
                                                        }))
                                                };
                                            </script>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="inactivemember">
                                <div style="margin-top:10px;" class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="table-datai">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Gender</th>
                                                <th>DOB</th>
                                                <th>No. HP</th>
                                                <th>Alamat</th>
                                                <th>Expired</th>
                                                <th>Token</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tableMemberi">
                                            <script>
                                                var tokenSession = '<?php echo $_SESSION['token']; ?>';
                                                var token = "Bearer" + " " + tokenSession;
                                                var myArray = [];
                                                var tableMemberi = document.getElementById("tableMemberi");
                                                const urlui = "https://api.klubaderai.com/api/users-inactive";

                                                $(document).ready(function() {
                                                    $.ajax({
                                                        method: "GET",
                                                        url: urlui,
                                                        headers: {
                                                            Authorization: token,
                                                        },
                                                        success: function(response) {
                                                            data = response.data;
                                                            $.each(data, function(i, data) {

                                                                var body = `<tr data-id=${data.id} >`;
                                                                body += "<td>" + data.id + "</td>";
                                                                body += "<td>" + data.name + "</td>";
                                                                body += "<td>" + data.email + "</td>";
                                                                body += "<td>" + data.gender + "</td>";
                                                                body += "<td>" + data.tanggal_lahir + "</td>";
                                                                body += "<td>" + data.nohp + "</td>";
                                                                body += "<td>" + data.alamat + "</td>";
                                                                body += "<td>" + data.expired + "</td>";
                                                                body += "<td>" + data.token + "</td>";
                                                                body += "<td>" +
                                                                    `<button id="update" class="btn btn-warning" role="button"><i class=" fa fa-pencil"></i></button>` +
                                                                    " " +
                                                                    `<button id="delete" data-toggle="modal" data-target="#exampleModalCenterui" class="btn btn-danger" role="button"><i class="fa fa-trash"></i></button>` +
                                                                    "</td>";
                                                                body += "</tr>";
                                                                $("#table-datai tbody").append(body);
                                                            });
                                                            /*DataTables instantiation.*/
                                                            $("#table-datai").DataTable({
                                                                responsive: true,
                                                                "pageLength": 50

                                                            });
                                                        },
                                                        error: function(response) {
                                                            hasil = response.responseJSON.message;
                                                            alert(hasil);
                                                        }
                                                    });
                                                    tableMemberi.addEventListener("click", (e) => {
                                                        e.preventDefault();
                                                        let deleteButtonisPressed = e.target.id == "delete";
                                                        let updateButtonisPressed = e.target.id == "update";

                                                        midui = e.target.parentElement.parentElement.dataset.id;

                                                        if (updateButtonisPressed) {
                                                            if (type == 2) {
                                                                var memID = sessionStorage.setItem("id-member", midui);
                                                                location.href = "/owformu_member";
                                                            } else {
                                                                var memID = sessionStorage.setItem("id-member", midui);
                                                                location.href = "formu_member";
                                                            }
                                                        }
                                                    })
                                                });




                                                function deleteDataui() {
                                                    var myHeaders = new Headers();
                                                    myHeaders.append(
                                                        "Authorization",
                                                        token);
                                                    var deleteRequest = {
                                                        method: "Delete",
                                                        headers: myHeaders,
                                                        redirect: "follow",
                                                    };
                                                    fetch(`${urlu}/${midui}`, deleteRequest)
                                                        .then((res) => res.json())
                                                        .then((result => {

                                                            var hasildata = result.success;
                                                            var message = result.message;
                                                            if (hasildata) {
                                                                sessionStorage.removeItem("id-member");
                                                                location.reload();
                                                            } else {
                                                                $('<div class="alert alert-danger">' +
                                                                    '<button type="button" class="close" data-dismiss="alert">' +
                                                                    `&times;</button>${message}</div>`).hide().prependTo('#model-bodyui').fadeIn(1000);

                                                                $(".alert").delay(3000).fadeOut(
                                                                    "normal",
                                                                    function() {
                                                                        $(this).remove();
                                                                    });
                                                            }
                                                        }))
                                                };
                                            </script>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
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