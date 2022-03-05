<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.2/xlsx.min.js"></script>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row page-title-header">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title">Data Kehadiran
                        <button id="btnLap" data-toggle="modal" data-target="#modalLaporan" style="float:right; margin-left:5px;" type="submit" class="btn btn-outline-warning btn-sm">Laporan Kehadiran</button>
                        <button id="btnAddowKehadiran" style="float:right; margin-left:5px; display: none;" type="submit" class="btn btn-inverse-primary btn-sm" onclick="window.location.href='/owform_kehadiran'">Tambah</button>
                        <button id="btnAddkehadiran" style="float:right; margin-left:5px; display: none;" type="submit" class="btn btn-inverse-primary btn-sm" onclick="window.location.href='/form_kehadiran'">Tambah</button>
                    </h4>
                    <script>
                        var type = '<?php echo $_SESSION['type']; ?>'
                        if (type == 2) {
                            var btnAdd = document.getElementById("btnAddowKehadiran")
                            btnAdd.style.display = 'block'
                        } else {
                            var btnAdd = document.getElementById("btnAddkehadiran")
                            btnAdd.style.display = 'block'
                        }
                    </script>
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
                                const urlTE = "https://api.klubaderai.com/api/kehadiran-export";

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
                                const urlTE = "https://api.klubaderai.com/api/kehadiran-export";

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
                                        var xlsHeader = ["Email", "Nama", "Tanggal", "Waktu"];
                                        createXLSLFormatObj.push(xlsHeader);
                                        $.each(data, function(i, data) {

                                            const dte = data.waktu;
                                            const date = dte.split(" ");

                                            /* XLS Rows Data */
                                            var xlsRows = [{

                                                "Email": data.email,
                                                "Nama": data.nama,
                                                "Tanggal": date[0],
                                                "Waktu": date[1]

                                            }];

                                            $.each(xlsRows, function(i, data) {
                                                var innerRowData = [];
                                                $.each(data, function(i, data) {

                                                    innerRowData.push(data);
                                                });
                                                createXLSLFormatObj.push(innerRowData);
                                            });
                                        });
                                        var filename = "Attendance Data.xlsx";

                                        var ws_name = "Data Kehadiran";
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
                                <label>Total Kehadiran : </label>
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
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="table-data">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Waktu</th>
                                        <th>Hari</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <script>
                                        var tokenSession = '<?php echo $_SESSION['token']; ?>';
                                        var token = "Bearer" + " " + tokenSession;
                                        var myArray = [];
                                        var tableKehadiran = document.getElementById("tabel-data");
                                        const url = "https://api.klubaderai.com/api/kehadiran";
                                        $(document).ready(function() {
                                            $.ajax({
                                                method: "GET",
                                                url: url,
                                                headers: {
                                                    Authorization: token,
                                                },
                                                success: function(response) {
                                                    data = response.data;

                                                    /*DataTables instantiation.*/
                                                    $("#table-data").DataTable({
                                                        data: data,
                                                        "autoWidth": false,
                                                        "sorting": false,
                                                        responsive: true,
                                                        "pageLength": 50,
                                                        columns: [{
                                                                'data': null,
                                                                'render': function(data) {
                                                                    const d = new Date(data.waktu);
                                                                    return d.toLocaleDateString()
                                                                }

                                                            },
                                                            {
                                                                'data': null,
                                                                'render': function(data) {
                                                                    const d = new Date(data.waktu);
                                                                    return d.toLocaleTimeString()
                                                                }
                                                            },
                                                            {
                                                                'data': null,
                                                                'render': function(data) {
                                                                    const d = new Date(data.waktu);
                                                                    const weekday = ["Minggu", "Senin", "Selama", "Rabu", "Kamis", "Jumat", "Sabtu"];
                                                                    return weekday[d.getDay()];

                                                                }
                                                            },

                                                            {
                                                                'data': 'nama'
                                                            },
                                                            {
                                                                'data': 'email'
                                                            },


                                                        ]
                                                    })
                                                },
                                                error: function(response) {
                                                    hasil = response.responseJSON.message;
                                                    alert(hasil);

                                                }
                                            });
                                        });
                                    </script>
                                </tbody>
                            </table>
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