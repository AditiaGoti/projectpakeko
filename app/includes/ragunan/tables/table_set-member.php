<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.2/xlsx.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row page-title-header">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title">Data Member
                        <button id="btnLap" data-toggle="modal" data-target="#modalLaporan" style="float:right; margin-left:5px;" type="submit" class="btn btn-outline-warning btn-sm">Search</button>
                        <button id="btnprint" onclick="print()" style="float:right; margin-left:5px;" type="submit" class="btn btn-outline-info btn-sm">Print</button>
                        <button id="btnAddowMember" style="float:right; margin-left:5px; display: none;" type="submit" class="btn btn-outline-primary btn-sm" onclick="window.location.href='/ragunan/owform_member'">Tambah</button>
                        <button id="btnAddMember" style="float:right; margin-left:5px; display: none;" type="submit" class="btn btn-outline-primary btn-sm" onclick="window.location.href='/ragunan/form_member'">Tambah</button>
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

                        <script>
                            function checkDate() {
                                sessionStorage.clear("result-m")
                                var tokenSession = '<?php echo $_SESSION['token']; ?>';
                                var token = "Bearer" + " " + tokenSession;
                                var myArray = [];
                                var dataLaporan = document.getElementById("dataLaporan");
                                const urlTE = "https://ragunan.tms-klar.com/api/users-export";

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
                                        location.reload();
                                    }))
                                    .catch(error => console.log('error', error));
                            }

                            function print(result) {
                                var hasil = sessionStorage.getItem("result-m");
                                var ex = JSON.parse(hasil);
                                var tokenSession = '<?php echo $_SESSION['token']; ?>';
                                var token = "Bearer" + " " + tokenSession;
                                var myArray = [];
                                var dataLaporan = document.getElementById("dataLaporan");
                                const urlTE = "https://ragunan.tms-klar.com/api/users-export";

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
                                urlencoded.append("start_date", ex.start_date);
                                urlencoded.append("end_date", ex.end_date);

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
                                        var xlsHeader = ["ID", "Name", "Email", "Lokal", "Gender", "Tempat Lahir", "Tanggal Lahir", "No. HP", "Alamat", "Expired Date", "Token"];

                                        createXLSLFormatObj.push(xlsHeader);
                                        $.each(data, function(i, data) {
                                            /* XLS Rows Data */
                                            var xlsRows = [{

                                                "ID": data.id,
                                                "Name": data.name,
                                                "Email": data.email,
                                                "Lokal": data.local,
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
                                        var filename = "Member Data Klub Ade Rai Ragunan.xlsx";

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
            <div class=" col-lg-6 mb-4">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div id="dateMember" class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Tanggal Daftar</h5>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                    <i class="fa fa-calendar"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" col-lg-6 mb-4">
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

            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
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
                                        var tokenSession = '<?php echo $_SESSION['token']; ?>';
                                        var token = "Bearer" + " " + tokenSession;
                                        var hasil = sessionStorage.getItem("result-m")
                                        var ex = JSON.parse(hasil);
                                        var type = '<?php echo $_SESSION['type']; ?>'
                                        var myArray = [];
                                        var tableMember = document.getElementById("tableMember");
                                        const urlu = "https://ragunan.tms-klar.com/api/users";
                                        member();
                                        date();

                                        function member() {
                                            var body = `<span class="h2 font-weight-bold mb-0">` + ex.total + " Orang" + `</span>`;
                                            $("#sumMember").append(body);
                                        };

                                        function date() {
                                            var body = `<span class="h2 font-weight-bold mb-0">` + ex.start_date + " s/d " + ex.end_date + `</span>`;
                                            $("#dateMember").append(body);
                                        };

                                        $(document).ready(function() {

                                            $("#table-data").DataTable({
                                                data: ex.data,
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
                                                    location.href = "/ragunan/owformu_member";
                                                } else {
                                                    var memID = sessionStorage.setItem("id-member", id);
                                                    location.href = "/ragunan/formu_member";
                                                }
                                            });

                                            $('#table-data tbody').on('click', 'button.deleteBtnU ', function() {
                                                var id = $(this).attr('value');
                                                var memID = sessionStorage.setItem("id-member", id);
                                            });
                                        });

                                        function deleteDatau() {
                                            displayLoading()
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
                                                    hideLoading()
                                                    var hasildata = result.success;
                                                    var message = result.message;
                                                    if (hasildata) {
                                                        sessionStorage.removeItem("id-member");
                                                        if (type == 2) {
                                                            location.href = '/ragunan/owall_member';

                                                        } else {
                                                            location.href = '/ragunan/all_member';
                                                        }
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