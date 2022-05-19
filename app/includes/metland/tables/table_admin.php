<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.2/xlsx.min.js"></script>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row page-title-header">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title">Data Admin
                        <button id="btnLap" data-toggle="modal" data-target="#modalLaporan" style="float:right; margin-left:5px;" type="submit" class="btn btn-outline-warning btn-sm">Laporan Admin</button>
                        <button style="display: block;" id="btnAddow" type="submit" class="btn btn-outline-primary btn-sm" onclick="window.location.href='/Metland/owform_admin'">Tambah</button>
                    </h4>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">MESSAGE</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="bodyModal">
                        <p> Anda Yakin Akan Hapus Data Ini?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button onclick="deleteData()" type="button" class="btn btn-danger">Delete</button>
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
                                const urlTE = "https://api.tms-klar.com/api/admins-export";

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
                                const urlTE = "https://api.tms-klar.com/api/admins-export";

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
                                        var xlsHeader = ["Name", "Email", "Gender", "Tempat Lahir", "Tanggal Lahir", "No. HP", "Alamat"];

                                        createXLSLFormatObj.push(xlsHeader);
                                        $.each(data, function(i, data) {
                                            /* XLS Rows Data */
                                            var xlsRows = [{

                                                "Name": data.name,
                                                "Email": data.email,
                                                "Gender": data.gender,
                                                "Tempat Lahir": data.tempat_lahir,
                                                "Tanggal Lahir": data.tanggal_lahir,
                                                "No. HP": data.nohp,
                                                "Alamat": data.alamat


                                            }];

                                            $.each(xlsRows, function(i, data) {
                                                var innerRowData = [];
                                                $.each(data, function(i, data) {

                                                    innerRowData.push(data);
                                                });
                                                createXLSLFormatObj.push(innerRowData);
                                            });
                                        });
                                        var filename = "Admin Data Klub Ade Rai.xlsx";

                                        var ws_name = "Data Admin";
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
                                <label>Total Admin : </label>
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
                            <table class="table table-striped table-bordered table-hover" style="width:100%" id="table-data">
                                <thead>
                                    <tr>
                                        <th colspan="2">Actions</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Gender</th>
                                        <th>DOB</th>
                                        <th>No. HP</th>
                                        <th>POB</th>
                                        <th>Alamat</th>
                                        <th style="display: none"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <script>
                                        var tokenSession = '<?php echo $_SESSION['token']; ?>';
                                        var token = "Bearer" + " " + tokenSession;
                                        var myArray = [];
                                        const url = "https://api.tms-klar.com/api/admin";
                                        $(document).ready(function() {
                                            $.ajax({
                                                method: "GET",
                                                url: url,
                                                headers: {
                                                    Authorization: token,
                                                },
                                                success: function(response) {
                                                    data = response.data;

                                                    $("#table-data").DataTable({
                                                        data: data,
                                                        responsive: true,
                                                        "pageLength": 50,
                                                        autoWidth: false,
                                                        "order": [
                                                            [2, "asc"]
                                                        ],
                                                        columns: [{
                                                                'data': null,
                                                                'render': function(data, id) {
                                                                    return '<button value="' + data.id + '" class="updateBtnUI btn btn-warning btn-xs" role="button"><i class=" fa fa-pencil"></i></button>'
                                                                }
                                                            },
                                                            {
                                                                'data': null,
                                                                'render': function(data) {
                                                                    return '<button  value="' + data.id + '" data-toggle="modal" data-target="#exampleModalCenter" class="deleteBtnUI btn btn-danger btn-xs" role="button"><i class="fa fa-trash"></i></button>'
                                                                }
                                                            },
                                                            {
                                                                'data': 'name'
                                                            },
                                                            {
                                                                'data': 'email'
                                                            },
                                                            {
                                                                'data': 'gender'
                                                            },

                                                            {
                                                                'data': 'tanggal_lahir'
                                                            },
                                                            {
                                                                'data': 'nohp'
                                                            },
                                                            {
                                                                'data': 'tempat_lahir'
                                                            },
                                                            {
                                                                'data': 'alamat'
                                                            }
                                                        ]
                                                    })
                                                    $('#table-data tbody').on('click', 'button.updateBtnUI ', function() {
                                                        var id = $(this).attr('value');
                                                        var admID = sessionStorage.setItem("id-admin", id);
                                                        location.href = "/metland/owformu_admin";

                                                    });

                                                    $('#table-data tbody').on('click', 'button.deleteBtnUI ', function() {
                                                        var id = $(this).attr('value');
                                                        var admID = sessionStorage.setItem("id-admin", id);
                                                    });
                                                },
                                                error: function(response) {
                                                    hasil = response.responseJSON.message;
                                                    alert(hasil);
                                                }
                                            });
                                        });


                                        function deleteData() {
                                            var admID = sessionStorage.getItem("id-admin");
                                            var myHeaders = new Headers();
                                            myHeaders.append(
                                                "Authorization",
                                                token);
                                            var deleteRequest = {
                                                method: "DELETE",
                                                headers: myHeaders,
                                                redirect: "follow",
                                            };

                                            fetch("https://api.tms-klar.com/api/admin" + "/" + admID, deleteRequest)
                                                .then((res) => res.json())
                                                .then((result => {

                                                    var hasildata = result.success;
                                                    var message = result.message;
                                                    if (hasildata) {
                                                        sessionStorage.removeItem("id-admin");
                                                        location.reload();
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
                                <!-- Modal -->

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