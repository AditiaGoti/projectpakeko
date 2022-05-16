<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.2/xlsx.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row page-title-header">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title">Data Member
                        <button id="btnLap" data-toggle="modal" data-target="#modalLaporan" style="float:right; margin-left:5px;" type="submit" class="btn btn-outline-warning btn-sm">Laporan Member</button>
                        <button id="btnAddowMember" style="float:right; margin-left:5px; display: none;" type="submit" class="btn btn-outline-primary btn-sm" onclick="window.location.href='/Metland/owform_member'">Tambah</button>
                        <button id="btnAddMember" style="float:right; margin-left:5px; display: none;" type="submit" class="btn btn-outline-primary btn-sm" onclick="window.location.href='/Metland/form_member'">Tambah</button>
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
                    <div class="modal-body" id="bodyModal">
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
                    <div class="modal-body" id="bodyModalA">
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
                    <div class="modal-body" id="bodyModalI">
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
                        <form onsubmit="checkDate(); return false">
                            <input required id="startDate" type="date"> s/d
                            <input required id="endDate" type="date">
                            <button type="submit" style="margin-top: -1px;" class="btn btn-outline-primary"><i style="margin: -1px;" class="fa fa-search"></i></button>
                            <button type="button" onclick="print()" style="margin-top: -1px;" class="btn btn-outline-info"><i style="margin: -1px;" class="fa fa-print"></i></button>
                        </form>
                        <script>
                            function checkDate() {
                                sessionStorage.clear("result-m")
                                var tokenSession = '<?php echo $_SESSION['token']; ?>';
                                var token = "Bearer" + " " + tokenSession;
                                const urlTE = "https://metland.tms-klar.com/api/users-export";

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
                                        sessionStorage.setItem("result-m", result);
                                        if (type == 2) {
                                            location.href = '/Metland/set-owall_member';
                                        } else {
                                            location.href = '/Metland/set-all_member';
                                        }


                                    }))
                                    .catch(error => console.log('error', error));
                            }

                            function print(result) {

                                var tokenSession = '<?php echo $_SESSION['token']; ?>';
                                var token = "Bearer" + " " + tokenSession;
                                const urlTE = "https://metland.tms-klar.com/api/users-export";

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
                                        var filename = "Member Data Klub Ade Rai.xlsx";

                                        var ws_name = "Data Member";
                                        var wb = XLSX.utils.book_new(),
                                            ws = XLSX.utils.aoa_to_sheet(createXLSLFormatObj);

                                        XLSX.utils.book_append_sheet(wb, ws, ws_name);
                                        XLSX.writeFile(wb, filename);

                                    }))
                                    .catch(error => console.log('error', error));

                            }
                        </script>
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
                                                <th colspan="2">Actions</th>
                                                <th>Nama</th>
                                                <th>id</th>
                                                <th>Email</th>
                                                <th>Expired</th>
                                                <th>Token</th>
                                                <th>DOB</th>
                                                <th>No. HP</th>
                                                <th>Gender</th>
                                                <th>Alamat</th>
                                                <th style="display: none"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <script>
                                                var tokenSession = '<?php echo $_SESSION['token']; ?>';
                                                var token = "Bearer" + " " + tokenSession;
                                                var type = '<?php echo $_SESSION['type']; ?>'
                                                var myArray = [];
                                                var tableMember = document.getElementById("tableMember");
                                                const urlu = "https://metland.tms-klar.com/api/users";

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

                                                            $("#table-data").DataTable({
                                                                data: data,
                                                                "order": [
                                                                    [2, "asc"]
                                                                ],
                                                                responsive: true,
                                                                "pageLength": 50,
                                                                autoWidth: false,
                                                                columns: [{
                                                                        'data': null,
                                                                        'render': function(data) {
                                                                            return '<button value="' + data.id + '" class="updateBtnU btn btn-warning btn-xs" role="button"><i class=" fa fa-pencil"></i></button>'
                                                                        }
                                                                    },
                                                                    {
                                                                        'data': null,
                                                                        'render': function(data) {
                                                                            return '<button  value="' + data.id + '" data-toggle="modal" data-target="#exampleModalCenteru" class=" deleteBtnU btn btn-danger btn-xs" role="button"><i class="fa fa-trash"></i></button>'
                                                                        }
                                                                    },
                                                                    {
                                                                        'data': 'name'
                                                                    },
                                                                    {
                                                                        'data': 'id'
                                                                    },
                                                                    {
                                                                        'data': 'email'
                                                                    },
                                                                    {
                                                                        'data': 'expired'
                                                                    },
                                                                    {
                                                                        'data': 'token'
                                                                    },
                                                                    {
                                                                        'data': 'tanggal_lahir'
                                                                    },
                                                                    {
                                                                        'data': 'nohp'
                                                                    },
                                                                    {
                                                                        'data': 'gender'
                                                                    },
                                                                    {
                                                                        'data': 'alamat'
                                                                    },
                                                                ]
                                                            })
                                                            $('#table-data tbody').on('click', 'button.updateBtnU ', function() {
                                                                var id = $(this).attr('value');
                                                                console.log(id);
                                                                if (type == 2) {
                                                                    var memID = sessionStorage.setItem("id-member", id);
                                                                    location.href = "/owformu_member";
                                                                } else {
                                                                    var memID = sessionStorage.setItem("id-member", id);
                                                                    location.href = "formu_member";
                                                                }
                                                            });

                                                            $('#table-data tbody').on('click', 'button.deleteBtnU ', function() {
                                                                var id = $(this).attr('value');
                                                                var memID = sessionStorage.setItem("id-member", id);
                                                            });

                                                        },
                                                        error: function(response) {
                                                            hasil = response.responseJSON.message;
                                                            alert(hasil);

                                                        }
                                                    });
                                                });

                                                function deleteDatau() {
                                                    var memID = sessionStorage.getItem("id-member");
                                                    var myHeaders = new Headers();
                                                    myHeaders.append(
                                                        "Authorization",
                                                        token);
                                                    var deleteRequest = {
                                                        method: "Delete",
                                                        headers: myHeaders,
                                                        redirect: "follow",
                                                    };
                                                    fetch(`${urlu}/${memID}`, deleteRequest)
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
                                                                    `&times;</button>${message}</div>`).hide().prependTo('#bodyModal').fadeIn(1000);

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
                                                <th colspan="2">Actions</th>
                                                <th>Nama</th>
                                                <th>id</th>
                                                <th>Email</th>
                                                <th>Expired</th>
                                                <th>Token</th>
                                                <th>DOB</th>
                                                <th>No. HP</th>
                                                <th>Gender</th>
                                                <th>Alamat</th>
                                                <th style="display: none"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <script>
                                                var tokenSession = '<?php echo $_SESSION['token']; ?>';
                                                var token = "Bearer" + " " + tokenSession;
                                                var myArray = [];
                                                const urlua = "https://metland.tms-klar.com/api/users-active";
                                                $(document).ready(function() {
                                                    $.ajax({
                                                        method: "GET",
                                                        url: urlua,
                                                        headers: {
                                                            Authorization: token,
                                                        },
                                                        success: function(response) {
                                                            data = response.data;
                                                            /*DataTables instantiation.*/
                                                            $("#table-dataa").DataTable({
                                                                data: data,
                                                                "order": [
                                                                    [2, "asc"]
                                                                ],
                                                                responsive: true,
                                                                "pageLength": 50,
                                                                autoWidth: false,
                                                                columns: [{
                                                                        'data': null,
                                                                        'render': function(data) {
                                                                            return '<button value="' + data.id + '" class="updateBtnUA btn btn-warning" role="button"><i class=" fa fa-pencil"></i></button>'
                                                                        }
                                                                    },
                                                                    {
                                                                        'data': null,
                                                                        'render': function(data) {
                                                                            return '<button  value="' + data.id + '" data-toggle="modal" data-target="#exampleModalCenterua" class=" deleteBtnUA btn btn-danger" role="button"><i class="fa fa-trash"></i></button>'
                                                                        }
                                                                    },
                                                                    {
                                                                        'data': 'name'
                                                                    },
                                                                    {
                                                                        'data': 'id'
                                                                    },
                                                                    {
                                                                        'data': 'email'
                                                                    },
                                                                    {
                                                                        'data': 'expired'
                                                                    },
                                                                    {
                                                                        'data': 'token'
                                                                    },
                                                                    {
                                                                        'data': 'tanggal_lahir'
                                                                    },
                                                                    {
                                                                        'data': 'nohp'
                                                                    },
                                                                    {
                                                                        'data': 'gender'
                                                                    },
                                                                    {
                                                                        'data': 'alamat'
                                                                    },
                                                                ]
                                                            })
                                                            $('#table-dataa tbody').on('click', 'button.updateBtnUA ', function() {
                                                                var id = $(this).attr('value');

                                                                if (type == 2) {
                                                                    var memID = sessionStorage.setItem("id-member", id);
                                                                    location.href = "/owformu_member";
                                                                } else {
                                                                    var memID = sessionStorage.setItem("id-member", id);
                                                                    location.href = "formu_member";
                                                                }
                                                            });

                                                            $('#table-dataa tbody').on('click', 'button.deleteBtnUA ', function() {
                                                                var id = $(this).attr('value');
                                                                var memID = sessionStorage.setItem("id-member", id);
                                                            });

                                                        },
                                                        error: function(response) {
                                                            hasil = response.responseJSON.message;
                                                            alert(hasil);
                                                        }
                                                    });
                                                });

                                                function deleteDataua() {
                                                    var memID = sessionStorage.getItem("id-member");
                                                    var myHeaders = new Headers();
                                                    myHeaders.append(
                                                        "Authorization",
                                                        token);
                                                    var deleteRequest = {
                                                        method: "Delete",
                                                        headers: myHeaders,
                                                        redirect: "follow",
                                                    };

                                                    fetch(`${urlu}/${memID}`, deleteRequest)
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
                                                                    `&times;</button>${message}</div>`).hide().prependTo('#bodyModalA').fadeIn(1000);

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
                                                <th colspan="2">Actions</th>
                                                <th>Nama</th>
                                                <th>id</th>
                                                <th>Email</th>
                                                <th>Expired</th>
                                                <th>Token</th>
                                                <th>DOB</th>
                                                <th>No. HP</th>
                                                <th>Gender</th>
                                                <th>Alamat</th>
                                                <th style="display: none"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <script>
                                                var tokenSession = '<?php echo $_SESSION['token']; ?>';
                                                var token = "Bearer" + " " + tokenSession;
                                                var myArray = [];
                                                const urlui = "https://metland.tms-klar.com/api/users-inactive";

                                                $(document).ready(function() {
                                                    $.ajax({
                                                        method: "GET",
                                                        url: urlui,
                                                        headers: {
                                                            Authorization: token,
                                                        },
                                                        success: function(response) {
                                                            data = response.data;

                                                            /*DataTables instantiation.*/
                                                            $("#table-datai").DataTable({
                                                                data: data,
                                                                "order": [
                                                                    [2, "asc"]
                                                                ],
                                                                responsive: true,
                                                                autoWidth: false,
                                                                "pageLength": 50,
                                                                columns: [{
                                                                        'data': null,
                                                                        'render': function(data) {
                                                                            return '<button value="' + data.id + '" class="updateBtnUI btn btn-warning" role="button"><i class=" fa fa-pencil"></i></button>'
                                                                        }
                                                                    },
                                                                    {
                                                                        'data': null,
                                                                        'render': function(data) {
                                                                            return '<button  value="' + data.id + '" data-toggle="modal" data-target="#exampleModalCenterui" class="deleteBtnUI btn btn-danger" role="button"><i class="fa fa-trash"></i></button>'
                                                                        }
                                                                    },
                                                                    {
                                                                        'data': 'name'
                                                                    },
                                                                    {
                                                                        'data': 'id'
                                                                    },
                                                                    {
                                                                        'data': 'email'
                                                                    },
                                                                    {
                                                                        'data': 'expired'
                                                                    },
                                                                    {
                                                                        'data': 'token'
                                                                    },
                                                                    {
                                                                        'data': 'tanggal_lahir'
                                                                    },
                                                                    {
                                                                        'data': 'nohp'
                                                                    },
                                                                    {
                                                                        'data': 'gender'
                                                                    },
                                                                    {
                                                                        'data': 'alamat'
                                                                    },
                                                                ]
                                                            })

                                                            $('#table-datai tbody').on('click', 'button.updateBtnUI ', function() {
                                                                var id = $(this).attr('value');
                                                                console.log(id);
                                                                if (type == 2) {
                                                                    var memID = sessionStorage.setItem("id-member", id);
                                                                    location.href = "/owformu_member";
                                                                } else {
                                                                    var memID = sessionStorage.setItem("id-member", id);
                                                                    location.href = "formu_member";
                                                                }
                                                            });

                                                            $('#table-datai tbody').on('click', 'button.deleteBtnUI ', function() {
                                                                var id = $(this).attr('value');
                                                                var memID = sessionStorage.setItem("id-member", id);
                                                            });
                                                        },
                                                        error: function(response) {
                                                            hasil = response.responseJSON.message;
                                                            alert(hasil);
                                                        }
                                                    });
                                                });

                                                function deleteDataui() {
                                                    var memID = sessionStorage.getItem("id-member");
                                                    var myHeaders = new Headers();
                                                    myHeaders.append(
                                                        "Authorization",
                                                        token);
                                                    var deleteRequest = {
                                                        method: "Delete",
                                                        headers: myHeaders,
                                                        redirect: "follow",
                                                    };
                                                    fetch(`${urlu}/${memID}`, deleteRequest)
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
                                                                    `&times;</button>${message}</div>`).hide().prependTo('#bodyModalI').fadeIn(1000);

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