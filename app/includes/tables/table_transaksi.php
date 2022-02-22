<div class="main-panel">
    <div class="content-wrapper">
        <div class="row page-title-header">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title">Transaction Data
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
                                        <th>Tanggal</th>
                                        <th>Waktu</th>
                                        <th>Keterangan</th>

                                        <!-- <th>Actions</th> -->
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
                                                        // body += "<td>" + `<button id="delete" class="btn btn-danger" role="button" data-toggle="modal" data-target="#exampleModalLong"><i class=" fa fa-trash"></i></button>` + "</td>";

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
                                                    alert('Fail!');
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