<div class="main-panel">
    <div class="content-wrapper">
        <div class="row page-title-header">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title">Dashboard</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div id="qrrow" class="col-lg-6 grid-margin stretch-card">
                <div class="card text-center">
                    <div class="card-header">
                        Hello, <?php echo $_SESSION['name'] ?>
                    </div>
                    <div id="fotoqr" class="card-body">
                        <svg>
                            <g id="qrcode" />
                        </svg>
                    </div>
                </div>
            </div>
            <div id="table-row" class="col-lg-6 grid-margin stretch-card">
                <div class="card text-center">
                    <div class="card-header">
                        Riwayat Kehadiran
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="table-data" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Waktu </th>
                                    </tr>
                                </thead>
                                <tbody id="tableMemberK">
                                    <script>
                                        var tokenSession = '<?php echo $_SESSION['token']; ?>';
                                        var token = "Bearer" + " " + tokenSession;
                                        var myArray = [];
                                        var tablePaket = document.getElementById("tabel-data");
                                        const url = "https://api.klubaderai.com/api/kehadiran";
                                        var qrcode = new QRCode(document.getElementById("fotoqr"), {
                                            useSVG: true,
                                        });

                                        function makeCode(data) {
                                            var id = `${data.id}`;
                                            qrcode.makeCode(id);
                                        }
                                        $(document).ready(function() {
                                            $.ajax({
                                                method: "GET",
                                                url: url,
                                                headers: {
                                                    Authorization: token,
                                                },
                                                success: function(response) {
                                                    makeCode(myArray);
                                                    data = response.data;
                                                    $.each(data, function(i, data) {

                                                        var body = `<tr data-id=${data.id} >`;
                                                        body += "<td>" + data.waktu + "</td>";
                                                        body += "<td>" + data.waktu + "</td>";
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