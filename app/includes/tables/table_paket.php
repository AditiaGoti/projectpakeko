        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row page-title-header">
                    <div class="col-12">
                        <div class="page-header">
                            <h4 class="page-title">Package Data</h4>
                            <button id="btnAddowPaket"  style="margin-left: 800px; display: none;" type="submit" class="btn btn-primary" onclick="window.location.href='/owform_admin'">Tambah</button>
                            <button id="btnAddPaket" style="margin-left: 800px; display: none;" type="submit" class="btn btn-primary" onclick="window.location.href='/form_admin'">Tambah</button>
                            <script>
                        var type = '<?php echo $_SESSION['type']; ?>'
                        if (type == 2) {
                            var btnAdd = document.getElementById("btnAddowPaket")
                            btnAdd.style.display = 'block'
                        } else {
                            var btnAdd = document.getElementById("btnAddPaket")
                            btnAdd.style.display = 'block'
                        }
                    </script>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="table-data">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Paket</th>
                                                    <th>Harga</th>
                                                    <th>CreatedBy</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <script>
                                                    var tokenSession = '<?php echo $_SESSION['token']; ?>';
                                                    var token = "Bearer" + " " + tokenSession;
                                                    var myArray = [];
                                                    var tablePaket = document.getElementById("tabel-data");
                                                    const url = "https://api.klubaderai.com/api/pakets";
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
                                                                    body += "<td>" + data.paket + "</td>";
                                                                    body += "<td>" + data.harga + "</td>";
                                                                    body += "<td>" + data.createdby + "</td>";
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
            <!-- content-wrapper ends -->
            <!-- partial:../../partials/_footer.html -->
            <footer class="footer">
                <div class="container-fluid clearfix">
                    <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2022. All Rights Reserved</span>
                </div>
            </footer>
            <!-- partial -->
        </div>