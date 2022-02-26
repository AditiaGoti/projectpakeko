<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.2/xlsx.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row page-title-header">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title">Transaction Data
                        <button id="btnLap" data-toggle="modal" data-target="#modalLaporan" style="float:right; margin-left:5px;" type="submit" class="btn btn-outline-warning btn-sm">Laporan Transaksi</button>
                        <button id="btnAddowTransaksi" style="float:right; margin-left:5px; display: none;" type="submit" class="btn btn-inverse-primary btn-sm" onclick="window.location.href='/owform_transaksi'">Tambah</button>
                        <button id="btnAddtransaksi" style="float:right; margin-left:5px; display: none;" type="submit" class="btn btn-inverse-primary btn-sm" onclick="window.location.href='/form_transaksi'">Tambah</button>
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
                    <div class="modal-body">
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
                                const urlTE = "https://api.klubaderai.com/api/transaksi-export";

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
                                        var totTransBilangan = data.total_trans;
                                        var totTrans = data.total_transbetween;
                                        var nominal = totTrans;

                                        var reverse = nominal.toString().split('').reverse().join(''),
                                            ribuan = reverse.match(/\d{1,3}/g);
                                        ribuan = ribuan.join('.').split('').reverse().join('');

                                        $(`<p style="margin-left:5px; float :right; margin-top:-5.3px;"> ${totTransBilangan}</p>`)
                                            .hide().prependTo('#totTrans').fadeIn(500);
                                        $(`<p style="margin-left:5px; float :right; margin-top:-5.3px;"> ${ribuan}</p>`)
                                            .hide().prependTo('#sumTrans').fadeIn(500);

                                    }))
                                    .catch(error => console.log('error', error));
                            }

                            function print(result) {

                                var tokenSession = '<?php echo $_SESSION['token']; ?>';
                                var token = "Bearer" + " " + tokenSession;
                                var myArray = [];
                                var dataLaporan = document.getElementById("dataLaporan");
                                const urlTE = "https://api.klubaderai.com/api/transaksi-export";

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
                                        var xlsHeader = ["TID", "ID", "Nama", "Paket", "Nominal", "Tanggal", "Created By", "Keterangan"];
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
                                        var filename = "Transaction Data.xlsx";

                                        var ws_name = "Data Transaksi";
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
                                <label id="totTrans">Total Transaksi :</label>
                                <!-- <input id="totTrans" disabled type="email" class="form-control " aria-label="email" style="margin-left: -2px;" /> -->
                            </div>
                            <div class="form-group col-md-6">
                                <label id="sumTrans">Jumlah Transaksi : </label>
                                <!-- <input id="sumTrans" disabled type="text" class="form-control " aria-label="name" style="margin-left: -2px;" /> -->
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
            <div class="col-xl-6 col-lg-4 mb-4">
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
            <div class="col-xl-6 col-lg-4 mb-4">
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
                                        <th>#</th>
                                        <th>ID</th>
                                        <th>Member</th>
                                        <th>Paket</th>
                                        <th>Nominal</th>
                                        <th>CreatedBy</th>
                                        <th>Waktu</th>
                                        <th>Tanggal</th>
                                        <th>Keterangan</th>

                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="tableTransaksi">
                                    <script>
                                        var tokenSession = '<?php echo $_SESSION['token']; ?>';
                                        var token = "Bearer" + " " + tokenSession;
                                        var myArray = [];
                                        var tableTransaksi = document.getElementById("tableTransaksi");
                                        const url = "https://api.klubaderai.com/api/transaksi";
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
                                                        var nominal = data.nominal;
                                                        var bilangan = nominal.replace('.00', '');

                                                        var reverse = bilangan.toString().split('').reverse().join(''),
                                                            ribuan = reverse.match(/\d{1,3}/g);
                                                        ribuan = ribuan.join('.').split('').reverse().join('');
                                                        const d = new Date(data.updated_at);
                                                        let time = d.toLocaleTimeString();
                                                        let date = d.toDateString();

                                                        var body = `<tr data-id=${data.id}>`;
                                                        body += "<td>" + data.id + "</td>";
                                                        body += "<td>" + data.id_member + "</td>";
                                                        body += "<td>" + data.nama_member + "</td>";
                                                        body += "<td>" + data.tipe_paket + "</td>";
                                                        body += "<td>" + "Rp. " + ribuan + "</td>";
                                                        body += "<td>" + data.createdby + "</td>";
                                                        body += "<td>" + time + "</td>";
                                                        body += "<td>" + date + "</td>";
                                                        body += "<td>" + data.keterangan + "</td>";
                                                        body += "<td>" +
                                                            `<button id="delete" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-danger" role="button"><i class="fa fa-trash"></i></button>` + "</td>";

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
                                                            [0, "desc"]
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

                                        $(document).ready(function() {
                                            $.ajax({
                                                method: "GET",
                                                url: url,
                                                headers: {
                                                    Authorization: token,
                                                },
                                                success: function(response) {
                                                    data = response.etc;
                                                    buildtot(data);
                                                    buildsum(data);

                                                    function buildtot(data) {
                                                        var body = `<span class="h2 font-weight-bold mb-0">` + data.total_transaksi + " Transaksi" + `</span>`;
                                                        $("#totTransaksi").append(body);
                                                    };

                                                    function buildsum(data) {
                                                        var bilangan = data.total_rupiah;
                                                        var reverse = bilangan.toString().split('').reverse().join(''),
                                                            ribuan = reverse.match(/\d{1,3}/g);
                                                        ribuan = ribuan.join('.').split('').reverse().join('');
                                                        var body = `<span class="h2 font-weight-bold mb-0">` + "Rp. " + ribuan + `</span>`;
                                                        $("#sumTransaksi").append(body);
                                                    };
                                                },
                                                error: function() {
                                                    alert('Terjadi Kesalahan');
                                                }
                                            });
                                        });
                                        tableTransaksi.addEventListener("click", (e) => {
                                            e.preventDefault();
                                            let deleteButtonisPressed = e.target.id == "delete";
                                            mid = e.target.parentElement.parentElement.dataset.id;
                                        })
                                        var myHeaders = new Headers();
                                        myHeaders.append(
                                            "Authorization",
                                            token);
                                        var deleteRequest = {
                                            method: "Delete",
                                            headers: myHeaders,
                                            redirect: "follow",
                                        };

                                        function deleteData() {
                                            fetch(`${url}/${mid}`, deleteRequest)
                                                .then((res) => res.json())
                                                .then((result => {

                                                    var hasildata = result.success;
                                                    var message = result.message;
                                                    if (hasildata) {
                                                        location.reload();
                                                    } else {
                                                        $('<div class="alert alert-danger">' +
                                                            '<button type="button" class="close" data-dismiss="alert">' +
                                                            `&times;</button>${message}</div>`).hide().prependTo('#table-data').fadeIn(1000);

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