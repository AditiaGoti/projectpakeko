<div class="main-panel">
    <div class="content-wrapper">
        <div class="row page-title-header">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title">Data Member
                        <button id="btnAddowMember" style="float:right; margin-left:5px; display: none;" type="submit" class="btn btn-inverse-primary btn-sm" onclick="window.location.href='/owform_member'">Tambah</button>
                        <button id="btnAddMember" style="float:right; margin-left:5px; display: none;" type="submit" class="btn btn-inverse-primary btn-sm" onclick="window.location.href='/form_member'">Tambah</button>
                    </h4>
                    <script>
                        var type = '<?php echo $_SESSION['type']; ?>'
                        if (type == 2) {
                            var btnAdd = document.getElementById("btnAddowMember")
                            btnAdd.style.display = 'block'

                        } else {
                            var btnAdd = document.getElementById("btnAddMember")
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
        <div class="row">
            <div class=" col-lg-4 mb-4">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div id="sumMember" class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Member</h5>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                    <i class="fa fa-users"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div id="sumAktif" class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Member Aktif</h5>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                    <i class="fa fa-user"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div id="sumTAktif" class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Member Non-Aktif</h5>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                    <i class="fa fa-user-times"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <nav style="padding-bottom:10px;">
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a style="display:none;" class="nav-item nav-link active" id="ownav-allmember-tab" data-toggle="tab" onclick="window.location.href='/owall_member'" role="tab" aria-controls="nav-allmember" aria-selected="true">All Member</a>
                                <a style="display:none;" class="nav-item nav-link" id="ownav-activemember-tab" data-toggle="tab" onclick="window.location.href='/owactive_member'" role="tab" aria-controls="nav-activemember" aria-selected="false">Active Member</a>
                                <a style="display:none;" class="nav-item nav-link" id="ownav-inactivemember-tab" data-toggle="tab" onclick="window.location.href='/owinactive_member'" role="tab" aria-controls="nav-inactivemember" aria-selected="false">Inactive Member</a>

                                <a style="display:none;" class="nav-item nav-link active" id="nav-allmember-tab" data-toggle="tab" onclick="window.location.href='/all_member'" role="tab" aria-controls="nav-allmember" aria-selected="true">All Member</a>
                                <a style="display:none;" class="nav-item nav-link" id="nav-activemember-tab" data-toggle="tab" onclick="window.location.href='/active_member'" role="tab" aria-controls="nav-activemember" aria-selected="false">Active Member</a>
                                <a style="display:none;" class="nav-item nav-link" id="nav-inactivemember-tab" data-toggle="tab" onclick="window.location.href='/inactive_member'" role="tab" aria-controls="nav-inactivemember" aria-selected="false">Inactive Member</a>
                                <script>
                                    var type = '<?php echo $_SESSION['type']; ?>'
                                    if (type == 2) {
                                        var owshowAll = document.getElementById("ownav-allmember-tab")
                                        var owshowActive = document.getElementById("ownav-activemember-tab")
                                        var owshowInactive = document.getElementById("ownav-inactivemember-tab")
                                        owshowAll.style.display = 'block'
                                        owshowActive.style.display = 'block'
                                        owshowInactive.style.display = 'block'

                                    } else {
                                        var showAll = document.getElementById("nav-allmember-tab")
                                        var showActive = document.getElementById("nav-activemember-tab")
                                        var showInactive = document.getElementById("nav-inactivemember-tab")
                                        showAll.style.display = 'block'
                                        showActive.style.display = 'block'
                                        showInactive.style.display = 'block'
                                    }
                                </script>

                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <script>
                                var type = '<?php echo $_SESSION['type']; ?>'
                                if (type == 2) {
                                    ` <div class="tab-pane fade show active " id="ownav-allmember" role="tabpanel" aria-labelledby="ownav-allmember-tab"></div>
                                    <div class="tab-pane fade " id="ownav-activemember" role="tabpanel" aria-labelledby="ownav-activemember-tab"></div>
                                    <div class="tab-pane fade " id="ownav-inactivemember" role="tabpanel" aria-labelledby="ownav-inactivemember-tab"></div>`
                                } else {
                                    ` <div class="tab-pane fade show active " id="nav-allmember" role="tabpanel" aria-labelledby="nav-allmember-tab"></div>
                                    <div class="tab-pane fade " id="nav-activemember" role="tabpanel" aria-labelledby="nav-activemember-tab"></div>
                                    <div class="tab-pane fade " id="nav-inactivemember" role="tabpanel" aria-labelledby="nav-inactivemember-tab"></div>`
                                }
                            </script>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="table-data">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>No. HP</th>
                                        <th>Alamat</th>
                                        <th>Expired</th>
                                        <th>Token</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="tableMember">
                                    <script>
                                        var tokenSession = '<?php echo $_SESSION['token']; ?>';
                                        var token = "Bearer" + " " + tokenSession;
                                        var type = '<?php echo $_SESSION['type']; ?>'
                                        var myArray = [];
                                        var tableMember = document.getElementById("tableMember");
                                        const url = "https://api.klubaderai.com/api/users";

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

                                                        var body = `<tr data-id=${data.id}>`;
                                                        body += "<td>" + data.id + "</td>";
                                                        body += "<td>" + data.name + "</td>";
                                                        body += "<td>" + data.email + "</td>";
                                                        body += "<td>" + data.nohp + "</td>";
                                                        body += "<td>" + data.alamat + "</td>";
                                                        body += "<td>" + data.expired + "</td>";
                                                        body += "<td>" + data.token + "</td>";
                                                        body += "<td>" + `<button id="update" class="btn btn-warning" role="button"><i class=" fa fa-pencil"></i></button>` +
                                                            " " +
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
                                                    member(data);
                                                    memberaktif(data);
                                                    membernon(data);

                                                    function member(data) {
                                                        var body = `<span class="h2 font-weight-bold mb-0">` + data.total_member + " Orang" + `</span>`;
                                                        $("#sumMember").append(body);
                                                    };

                                                    function memberaktif(data) {
                                                        var body = `<span class="h2 font-weight-bold mb-0">` + data.total_member_active + " Orang" + `</span>`;
                                                        $("#sumAktif").append(body);
                                                    };

                                                    function membernon(data) {
                                                        var body = `<span class="h2 font-weight-bold mb-0">` + data.total_member_inactive + " Orang" + `</span>`;
                                                        $("#sumTAktif").append(body);
                                                    };
                                                },
                                                error: function() {
                                                    alert('Fail!');
                                                }
                                            });
                                        });

                                        tableMember.addEventListener("click", (e) => {
                                            e.preventDefault();
                                            let deleteButtonisPressed = e.target.id == "delete";
                                            let updateButtonisPressed = e.target.id == "update";

                                            mid = e.target.parentElement.parentElement.dataset.id;
                                            if (updateButtonisPressed) {
                                                if (type == 2) {
                                                    var memID = sessionStorage.setItem("id-member", mid);
                                                    location.href = "/owformu_member";
                                                } else {
                                                    var memID = sessionStorage.setItem("id-member", mid);
                                                    location.href = "formu_member";
                                                }
                                            }
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
                                                        sessionStorage.removeItem("id-member");
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
</div>
<script>



</script>