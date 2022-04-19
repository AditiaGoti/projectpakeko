<div class="main-panel">
    <div class="content-wrapper">
        <div class="row page-title-header">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title">Package Data
                        <button id="btnAddowPaket" style="float:right; margin-left:5px; display: none;" type="submit" class="btn btn-outline-primary btn-sm" onclick="window.location.href='/ragunan/owform_paket'">Tambah</button>
                        <button id="btnAddPaket" style="float:right; margin-left:5px; display: none;" type="submit" class="btn btn-outline-primary btn-sm" onclick="window.location.href='/ragunan/form_paket'">Tambah</button>
                    </h4>
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
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="table-data">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Actions</th>
                                            <th>Paket</th>
                                            <th>Durasi</th>
                                            <th>Token</th>
                                            <th>Harga</th>
                                            <th>CreatedBy</th>
                                            <th style="display: none"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="tablepaket">
                                        <script>
                                            var tokenSession = '<?php echo $_SESSION['token']; ?>';
                                            var token = "Bearer" + " " + tokenSession;
                                            var myArray = [];
                                            const url = "https://api.tms-klar.com/api/pakets";
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
                                                            "autoWidth": false,
                                                            columns: [{
                                                                    'data': null,
                                                                    'render': function(data) {
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
                                                                    'data': 'paket'
                                                                },
                                                                {
                                                                    'data': 'duration',

                                                                },
                                                                {
                                                                    'data': 'nilai_token',

                                                                },
                                                                {
                                                                    'data': 'harga',
                                                                    'render': DataTable.render.number(',', '.', 2, 'Rp. ')
                                                                },
                                                                {
                                                                    'data': 'createdby'
                                                                },
                                                            ]
                                                        })
                                                        $('#table-data tbody').on('click', 'button.updateBtnUI ', function() {
                                                            var id = $(this).attr('value');
                                                            if (type == 2) {
                                                                var pakID = sessionStorage.setItem('id-paket', id);
                                                                location.href = "/owformu_paket";
                                                            } else {
                                                                var pakID = sessionStorage.setItem('id-paket', id);
                                                                location.href = "/formu_paket";
                                                            }
                                                        });

                                                        $('#table-data tbody').on('click', 'button.deleteBtnUI ', function() {
                                                            var id = $(this).attr('value');
                                                            var admID = sessionStorage.setItem("id-paket", id);
                                                        });
                                                    },
                                                    error: function() {
                                                        alert('Terjadi Kesalahan');

                                                    }
                                                });
                                            });


                                            function deleteData() {
                                                var pakID = sessionStorage.getItem('id-paket');
                                                var myHeaders = new Headers();
                                                myHeaders.append(
                                                    "Authorization",
                                                    token);
                                                var deleteRequest = {
                                                    method: "Delete",
                                                    headers: myHeaders,
                                                    redirect: "follow",
                                                };
                                                fetch(`${url}/${pakID}`, deleteRequest)
                                                    .then((res) => res.json())
                                                    .then((result => {

                                                        var hasildata = result.success;
                                                        var message = result.message;
                                                        if (hasildata) {
                                                            sessionStorage.removeItem("id-paket");
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
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright ©️ 2022. All Rights Reserved</span>
        </div>
    </footer>
    <!-- partial -->
</div>