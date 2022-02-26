<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.2/xlsx.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


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
                    <div class="modal-body" style="height:135px">
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

                                        $(`<p style="margin-left:5px; float :right; margin-top:-5.3px;">${totTrans} </p>`)
                                            .hide().prependTo('#totKehadiran').fadeIn(500);

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
                                <label id="totKehadiran">Total Kehadiran : </label>
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
                                        <th>Email</th>
                                        <th>Nama</th>
                                        <th>Tanggal</th>
                                        <th>Waktu</th>
                                        <!-- <th>Action</th> -->
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
                                                    $.each(data, function(i, data) {
                                                        const d = new Date(data.waktu);
                                                        let time = d.toLocaleTimeString();
                                                        let date = d.toDateString();

                                                        var body = "<tr>";

                                                        body += "<td>" + data.email + "</td>";
                                                        body += "<td>" + data.nama + "</td>";
                                                        body += "<td>" + date + "</td>";
                                                        body += "<td>" + time + "</td>";
                                                        // body += "<td>" + `<button class="btn btn-warning" role="button"><i class=" fa fa-pencil"></i></button>` + " " + `<button class="btn btn-danger" role="button"><i class="fa fa-trash"></i></button>` + "</td>";

                                                        body += "</tr>";
                                                        $("#table-data tbody").append(body);
                                                    });
                                                    /*DataTables instantiation.*/
                                                    $("#table-data").DataTable({
                                                        responsive: true,

                                                        dom: 'Bfrtip',
                                                        buttons: [
                                                            'excel', 'pdf', 'print'
                                                        ],
                                                        "order": [
                                                            [2, "desc"]
                                                        ]

                                                    });
                                                },
                                                error: function(response) {
                                                    hasil = response.responseJSON.message;
                                                    alert(hasil);
                                                    location.href = "/logout";
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>