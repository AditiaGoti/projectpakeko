<div class="main-panel">
    <div class="content-wrapper">
        <div class="row page-title-header">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title">Transaction Data
                    <button id="btnAddowTransaksi" style="float:right; margin-left:5px; display: none;" type="submit" class="btn btn-primary" onclick="window.location.href='/owform_admin'">Tambah</button>
                    <button id="btnAddtransaksi" style="float:right; margin-left:5px; display: none;" type="submit" class="btn btn-primary" onclick="window.location.href='/form_admin'">Tambah</button></h4>
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
                                <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                    <i class="fas fa-chart-bar"></i>
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
                                <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                    <i class="fas fa-chart-bar"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-11 grid-margin stretch-card">
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
                                        <th>Keterangan</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <script>
                                        var tokenSession = '<?php echo $_SESSION['token']; ?>';
                                        var token = "Bearer" + " " + tokenSession;
                                        var myArray = [];
                                        var tablePaket = document.getElementById("tabel-data");
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

                                                        var body = "<tr>";
                                                        body += "<td>" + data.id + "</td>";
                                                        body += "<td>" + data.id_member + "</td>";
                                                        body += "<td>" + data.nama_member + "</td>";
                                                        body += "<td>" + data.tipe_paket + "</td>";
                                                        body += "<td>" + data.nominal + "</td>";
                                                        body += "<td>" + data.createdby + "</td>";
                                                        body += "<td>" + data.keterangan + "</td>";
                                                        body += "<td>" + `<button class="fa fa-pencil" role="button"></button>` + " " + `<button class="fa fa-trash" role="button"></button>` + "</td>";

                                                        body += "</tr>";
                                                        $("#table-data tbody").append(body);
                                                    });
                                                    /*DataTables instantiation.*/
                                                    $("#table-data").DataTable({
                                                        responsive: true,

                                                    });
                                                },
                                                error: function() {
                                                    alert('Fail!');

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
                                                        var body = `<span class="h2 font-weight-bold mb-0">` + "Rp. " + data.total_rupiah + `</span>`;
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