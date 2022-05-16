<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.2/xlsx.min.js"></script>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row page-title-header">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title">Transaction Data
                        <button id="btnLap" data-toggle="modal" data-target="#modalLaporan" style="float:right; margin-left:5px;" type="submit" class="btn btn-outline-warning btn-sm">Search</button>
                        <button id="btnprint" onclick="print()" style="float:right; margin-left:5px;" type="submit" class="btn btn-outline-info btn-sm">Print</button>
                        <button id="btnAddowTransaksi" style="float:right; margin-left:5px; display: none;" type="submit" class="btn btn-outline-primary btn-sm" onclick="window.location.href='/Metland/owform_transaksi'">Tambah</button>
                        <button id="btnAddtransaksi" style="float:right; margin-left:5px; display: none;" type="submit" class="btn btn-outline-primary btn-sm" onclick="window.location.href='/Metland/form_transaksi'">Tambah</button>
                    </h4>
                    <script>
                        var type = '<?php echo $_SESSION['type']; ?>'
                        if (type == 2) {
                            var btnAdd = document.getElementById("btnAddowTransaksi")
                            btnAdd.style.display = 'block'
                        } else {
                            var btnAdd = document.getElementById("btnAddtransaksi")
                            btnAdd.style.display = 'block'
                        }
                    </script>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Message</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div id="bodyModal" class="modal-body">
                        Anda Yakin Akan Hapus Data Ini?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" onclick="deleteData()" class="btn btn-danger">Delete</button>
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
                        <form onsubmit="checkDate();return false">
                            <input required id="startDate" type="date"> s/d
                            <input required id="endDate" type="date">
                            <button type="submit" style="margin-top: -1px;" class="btn btn-outline-primary btn-sm"><i style="margin: -1px;" class="fa fa-search"></i></button>
                        </form>
                        <script>
                            function checkDate() {
                                sessionStorage.clear("result")
                                var tokenSession = '<?php echo $_SESSION['token']; ?>';
                                var token = "Bearer" + " " + tokenSession;

                                var dataLaporan = document.getElementById("dataLaporan");
                                const urlTE = "https://metland.tms-klar.com/api/transaksi-export";

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
                                        sessionStorage.setItem("result", result);
                                        location.reload();
                                    }))
                                    .catch(error => console.log('error', error));
                            }

                            function print(result) {
                                var hasil = sessionStorage.getItem("result");
                                var ex = JSON.parse(hasil);
                                var tokenSession = '<?php echo $_SESSION['token']; ?>';
                                var token = "Bearer" + " " + tokenSession;
                                var myArray = [];
                                var dataLaporan = document.getElementById("dataLaporan");
                                const urlTE = "https://metland.tms-klar.com/api/transaksi-export";

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
                                        var xlsHeader = ["TID", "ID", "Nama", "Paket", "Nominal", "Tanggal", "Created By", "Pembayaran", "Keterangan"];
                                        createXLSLFormatObj.push(xlsHeader);
                                        $.each(data, function(i, data) {
                                            const dte = data.updated_at;
                                            const date = dte.split("T");
                                            var nominal = data.nominal;
                                            var bilangan = nominal.replace('.00', '');

                                            var reverse = bilangan.toString().split('').reverse().join(''),
                                                ribuan = reverse.match(/\d{1,3}/g);
                                            ribuan = ribuan.join('.').split('').reverse().join('');

                                            /* XLS Rows Data */
                                            var xlsRows = [{
                                                "TID": data.id,
                                                "ID": data.id_member,
                                                "Nama": data.nama_member,
                                                "Paket": data.tipe_paket,
                                                "Nominal": ribuan,
                                                "Tanggal": date[0],
                                                "Created_By": data.createdby,
                                                "Pembayaran": data.pembayaran,
                                                "Keterangan": data.keterangan
                                            }];

                                            $.each(xlsRows, function(i, data) {
                                                var innerRowData = [];
                                                $.each(data, function(i, data) {

                                                    innerRowData.push(data);
                                                });
                                                createXLSLFormatObj.push(innerRowData);
                                            });
                                        });
                                        var filename = "Transaction Data Klub Ade Rai.xlsx";

                                        var ws_name = "Data Transaksi";
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
            <div class="col-xl-4 col-lg-4 mb-4">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div id="dateTransaksi" class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Tanggal Transaksi </h5>

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
            <div class="col-xl-4 col-lg-4 mb-4">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div id="totTransaksi" class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Total Transaksi </h5>

                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                    <i class="fa fa-book"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 mb-4">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div id="sumTransaksi" class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Transaksi </h5>

                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                                    <i class="fa fa-money"></i>
                                </div>
                            </div>
                        </div>
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
                                        <th>Actions</th>
                                        <th>Nama</th>
                                        <th>MID</th>
                                        <th>Paket</th>
                                        <th>Nominal</th>
                                        <th>Tanggal</th>
                                        <th>Waktu</th>
                                        <th>CreatedBy</th>
                                        <th>Pembayaran</th>
                                        <th>Ket</th>

                                    </tr>
                                </thead>
                                <tbody id="tableTransaksi">
                                    <script>
                                        var tokenSession = '<?php echo $_SESSION['token']; ?>';
                                        var token = "Bearer" + " " + tokenSession;
                                        var hasil = sessionStorage.getItem("result")
                                        var ex = JSON.parse(hasil);
                                        var myArray = [];
                                        const url = "https://metland.tms-klar.com/api/transaksi";
                                        buildsum();
                                        buildtot();
                                        builddate();

                                        function builddate() {
                                            var body = `<span class="h7 font-weight-bold mb-0">` + ex.start_date + " s/d " + ex.end_date + `</span>`;
                                            $("#dateTransaksi").append(body);
                                        };

                                        function buildtot() {
                                            var body = `<span class="h2 font-weight-bold mb-0">` + ex.total_trans + " Transaksi" + `</span>`;
                                            $("#totTransaksi").append(body);
                                        };

                                        function buildsum() {
                                            var bilangan = ex.total_transbetween;
                                            var reverse = bilangan.toString().split('').reverse().join(''),
                                                ribuan = reverse.match(/\d{1,3}/g);
                                            ribuan = ribuan.join('.').split('').reverse().join('');
                                            var body = `<span class="h2 font-weight-bold mb-0">` + "Rp. " + ribuan + `</span>`;
                                            $("#sumTransaksi").append(body);
                                        };

                                        $(document).ready(function() {
                                            $("#table-data").DataTable({
                                                data: ex.data,
                                                "autoWidth": false,
                                                responsive: true,
                                                "pageLength": 50,
                                                sorting: false,
                                                columns: [{
                                                        'data': null,
                                                        'render': function(data) {
                                                            return '<button  value="' + data.id + '" data-toggle="modal" data-target="#exampleModalCenter" class=" deleteBtnUA btn btn-danger btn-xs" role="button"><i class="fa fa-trash"></i></button>'
                                                        }
                                                    },
                                                    {
                                                        'data': 'nama_member'
                                                    },
                                                    {
                                                        'data': 'id_member'
                                                    },

                                                    {
                                                        'data': 'tipe_paket'
                                                    },
                                                    {
                                                        'data': 'nominal',
                                                        'render': DataTable.render.number(',', '.', 2, 'Rp. ')
                                                    },
                                                    {
                                                        'data': null,
                                                        'render': function(data) {
                                                            const d = new Date(data.updated_at);
                                                            return d.toLocaleDateString()
                                                        }
                                                    },
                                                    {
                                                        'data': null,
                                                        'render': function(data) {
                                                            const d = new Date(data.updated_at);
                                                            return d.toLocaleTimeString()
                                                        }
                                                    },
                                                    {
                                                        'data': 'createdby'
                                                    },
                                                    {
                                                        'data': 'pembayaran'
                                                    },
                                                    {
                                                        'data': 'keterangan'
                                                    },

                                                ]
                                            })
                                        });

                                        $('#table-data tbody').on('click', 'button.deleteBtnUA ', function() {
                                            var id = $(this).attr('value');
                                            var transID = sessionStorage.setItem("id-transaksi", id);
                                        });

                                        function deleteData() {
                                            var transID = sessionStorage.getItem("id-transaksi");
                                            var myHeaders = new Headers();
                                            myHeaders.append(
                                                "Authorization",
                                                token);
                                            var deleteRequest = {
                                                method: "Delete",
                                                headers: myHeaders,
                                                redirect: "follow",
                                            };
                                            fetch(`${url}/${transID}`, deleteRequest)
                                                .then((res) => res.json())
                                                .then((result => {

                                                    var hasildata = result.success;
                                                    var message = result.message;
                                                    if (hasildata) {
                                                        sessionStorage.removeItem("id-transaksi");
                                                        if (type == 2) {
                                                            location.href = '/Metland/owtransaksi';

                                                        } else {
                                                            location.href = '/Metland/transaksi';
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
    </div>

    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
    <footer class="footer">
        <div class="container-fluid clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2022. All Rights Reserved</span>
        </div>
    </footer>


    <!-- partial -->