<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.2/xlsx.min.js"></script>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row page-title-header">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title">Data Kehadiran
                        <button id="btnLap" data-toggle="modal" data-target="#modalLaporan" style="float:right; margin-left:5px;" type="submit" class="btn btn-outline-warning btn-sm">Search</button>
                        <button id="btnprint" onclick="print()" style="float:right; margin-left:5px;" type="submit" class="btn btn-outline-info btn-sm">Print</button>
                        <button id="btnAddowKehadiran" style="float:right; margin-left:5px; display: none;" type="submit" class="btn btn-outline-primary btn-sm" onclick="window.location.href='/metland/owform_kehadiran'">Tambah</button>
                        <button id="btnAddkehadiran" style="float:right; margin-left:5px; display: none;" type="submit" class="btn btn-outline-primary btn-sm" onclick="window.location.href='/metland/form_kehadiran'">Tambah</button>
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

                            function checkDate() {
                                sessionStorage.clear("result-k")
                                var tokenSession = '<?php echo $_SESSION['token']; ?>';
                                var token = "Bearer" + " " + tokenSession;
                                var myArray = [];
                                var dataLaporan = document.getElementById("dataLaporan");
                                const urlTE = "https://api.tms-klar.com/api/kehadiran-export";

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
                                        sessionStorage.setItem("result-k", result);
                                        if (type == 2) {
                                            location.href = '/metland/set-owkehadiran';
                                        } else {
                                            location.href = '/metland/set-kehadiran';
                                        }
                                    }))
                                    .catch(error => console.log('error', error));
                            }

                            function print(result) {

                                var tokenSession = '<?php echo $_SESSION['token']; ?>';
                                var token = "Bearer" + " " + tokenSession;
                                var myArray = [];
                                var dataLaporan = document.getElementById("dataLaporan");
                                const urlTE = "https://api.tms-klar.com/api/kehadiran-export";

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
                                        var xlsHeader = ["Tanggal", "Waktu", "Email", "Nama"];
                                        createXLSLFormatObj.push(xlsHeader);
                                        $.each(data, function(i, data) {

                                            const dte = data.waktu;
                                            const date = dte.split(" ");

                                            /* XLS Rows Data */
                                            var xlsRows = [{

                                                "Tanggal": date[0],
                                                "Waktu": date[1],
                                                "Email": data.email,
                                                "Nama": data.nama

                                            }];

                                            $.each(xlsRows, function(i, data) {
                                                var innerRowData = [];
                                                $.each(data, function(i, data) {

                                                    innerRowData.push(data);
                                                });
                                                createXLSLFormatObj.push(innerRowData);
                                            });
                                        });
                                        var filename = "Attendance Data  Klub Ade Rai.xlsx";

                                        var ws_name = "Data Kehadiran";
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
                            <div id="dateKehadiran" class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Tanggal Kehadiran</h5>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
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
                            <div id="sumKehadiran" class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Kehadiran</h5>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                    <i class="fa fa-clipboard"></i>
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
                                        <th>Tanggal</th>
                                        <th>Waktu</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <script>
                                        var tokenSession = '<?php echo $_SESSION['token']; ?>';
                                        var token = "Bearer" + " " + tokenSession;
                                        var myArray = [];
                                        var hasil = sessionStorage.getItem("result-k")
                                        var ex = JSON.parse(hasil);
                                        var tableKehadiran = document.getElementById("tabel-data");
                                        const url = "https://api.tms-klar.com/api/kehadiran";
                                        kehadiran();
                                        date();

                                        function kehadiran() {
                                            var body = `<span class="h2 font-weight-bold mb-0">` + ex.total + " Orang" + `</span>`;
                                            $("#sumKehadiran").append(body);
                                        };

                                        function date() {
                                            var body = `<span class="h2 font-weight-bold mb-0">` + ex.start_date + " s/d " + ex.end_date + `</span>`;
                                            $("#dateKehadiran").append(body);
                                        };

                                        $(document).ready(function() {
                                            hideLoading()

                                            /*DataTables instantiation.*/
                                            $("#table-data").DataTable({
                                                data: ex.data,
                                                "autoWidth": false,
                                                "sorting": false,
                                                responsive: true,
                                                "pageLength": 50,
                                                columns: [{
                                                        'data': null,
                                                        'render': function(data) {
                                                            const dte = data.waktu;
                                                            const date = dte.split(" ");
                                                            return date[0];
                                                        }

                                                    },
                                                    {
                                                        'data': null,
                                                        'render': function(data) {
                                                            const dte = data.waktu;
                                                            const date = dte.split(" ");
                                                            return date[1] + " WIB";
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
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright ?? 2022. All Rights Reserved</span>
        </div>
    </footer>
    <!-- partial -->
</div>