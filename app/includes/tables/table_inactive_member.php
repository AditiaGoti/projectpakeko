<div class="main-panel">
    <div class="content-wrapper">
        <div class="row page-title-header">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title">Data Inactive Member
                        <button id="btnAddowActiveMember" style="float:right; margin-left:5px; display: none; " type="submit" class="btn btn-danger" onclick="window.location.href='/owinactive_member'">Inactive Member</button>
                        <button id="btnAddActivemember" style="float:right; margin-left:5px; display: none;" type="submit" class="btn btn-danger" onclick="window.location.href='/inactive_member'">inactive Member</button>
                        <button id="btnAddowInActiveMember" style="float:right; margin-left:5px; display: none;" type="submit" class="btn btn-success" onclick="window.location.href='/owactive_member'">Active Member</button>
                        <button id="btnAddInActivemember" style="float:right; margin-left:5px; display: none;" type="submit" class="btn btn-success" onclick="window.location.href='/active_member'">Active Member</button>
                        <button id="btnAddowMember" style="float:right; margin-left:5px; display: none;" type="submit" class="btn btn-primary" onclick="window.location.href='/owform_member'">Tambah</button>
                        <button id="btnAddMember" style="float:right; margin-left:5px; display: none;" type="submit" class="btn btn-primary" onclick="window.location.href='/form_member'">Tambah</button>
                    </h4>
                    <script>
                        var type = '<?php echo $_SESSION['type']; ?>'
                        if (type == 2) {
                            var btnAdd = document.getElementById("btnAddowMember")
                            var btnAddNewMember = document.getElementById("btnAddowActiveMember")
                            var btnAddNewInMember = document.getElementById("btnAddowInActiveMember")
                            btnAdd.style.display = 'block'
                            btnAddNewMember.style.display = "block"
                            btnAddNewInMember.style.display = "block"

                        } else {
                            var btnAddNewMember = document.getElementById("btnAddActivemember")
                            var btnAdd = document.getElementById("btnAddMember")
                            var btnAddNewInMember = document.getElementById("btnAddInActivemember")
                            btnAdd.style.display = 'block'
                            btnAddNewMember.style.display = "block"
                            btnAddNewInMember.style.display = "block"
                        }
                    </script>
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
                                <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                    <i class="fas fa-chart-pie"></i>
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
                                <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                    <i class="fas fa-users"></i>
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
                                <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                    <i class="fas fa-users"></i>
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
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>No. HP</th>
                                        <th>Alamat</th>
                                        <th>Expired</th>
                                        <th>Token</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <script>
                                        var tokenSession = '<?php echo $_SESSION['token']; ?>';
                                        var token = "Bearer" + " " + tokenSession;
                                        var myArray = [];
                                        var tablePaket = document.getElementById("tabel-data");
                                        const url = "https://api.klubaderai.com/api/users-inactive";
                                        const urlm = "https://api.klubaderai.com/api/users";
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
                                                        body += "<td>" + data.name + "</td>";
                                                        body += "<td>" + data.email + "</td>";
                                                        body += "<td>" + data.nohp + "</td>";
                                                        body += "<td>" + data.alamat + "</td>";
                                                        body += "<td>" + data.expired + "</td>";
                                                        body += "<td>" + data.token + "</td>";
                                                        body += "<td>" + `<button class="btn btn-warning" role="button"><i class=" fa fa-pencil"></i></button>` + " " + `<button class="btn btn-danger" role="button"><i class="fa fa-trash"></i></button>` + "</td>";

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
                                                error: function() {
                                                    alert('Fail!');

                                                }
                                            });

                                        });
                                        $(document).ready(function() {
                                            $.ajax({
                                                method: "GET",
                                                url: urlm,
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
                                            let deleteButtonisPressed = e.target.id == "deleteMember";
                                            let updateButtonisPressed = e.target.id == "updateMember";

                                            var myHeaders = new Headers();
                                            myHeaders.append(
                                                "Authorization",
                                                token);
                                            var deleteRequest = {
                                                method: "Delete",
                                                headers: myHeaders,
                                                redirect: "follow",
                                            };

                                            mid = e.target.parentElement.parentElement.dataset.id;
                                            if (deleteButtonisPressed) {
                                                fetch(`${url}/${mid}`, deleteRequest)
                                                    .then((res) => res.json())
                                                    .then(location.reload());
                                            }
                                            if (updateButtonisPressed) {
                                                if (type == 2) {
                                                    var memID = sessionStorage.getItem(mid);
                                                    location.href = "/owformu_member";
                                                } else {
                                                    var memID = sessionStorage.getItem(mid);
                                                    location.href = "formu_member";
                                                }
                                            }
                                        });
                                        tableMember.addEventListener("click", (e) => {
                                            e.preventDefault();
                                            let deleteButtonisPressed = e.target.id == "deleteMember";
                                            let updateButtonisPressed = e.target.id == "updateMember";

                                            var myHeaders = new Headers();
                                            myHeaders.append(
                                                "Authorization",
                                                token);
                                            var deleteRequest = {
                                                method: "Delete",
                                                headers: myHeaders,
                                                redirect: "follow",
                                            };

                                            mid = e.target.parentElement.parentElement.dataset.id;
                                            if (deleteButtonisPressed) {
                                                fetch(`${url}/${mid}`, deleteRequest)
                                                    .then((res) => res.json())
                                                    .then(location.reload());
                                            }
                                            if (updateButtonisPressed) {
                                                if (type == 2) {
                                                    var memID = sessionStorage.getItem(mid);
                                                    location.href = "/owformu_member";
                                                } else {
                                                    var memID = sessionStorage.getItem(mid);
                                                    location.href = "formu_member";
                                                }
                                            }
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
<!-- <script>


    tableMember.addEventListener("click", (e) => {
        e.preventDefault();
        let deleteButtonisPressed = e.target.id == "deleteMember";

        var myHeaders = new Headers();
        myHeaders.append(
            "Authorization",
            token);
        var deleteRequest = {
            method: "Delete",
            headers: myHeaders,
            redirect: "follow",
        };

        id = e.target.parentElement.parentElement.dataset.id;
        if (deleteButtonisPressed) {
            fetch(`${url}/${id}`, deleteRequest)
                .then((res) => res.json())
                .then(location.reload());
        }
    });
</script> -->