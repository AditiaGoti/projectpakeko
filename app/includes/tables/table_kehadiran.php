<div class="main-panel">
    <div class="content-wrapper">
        <div class="row page-title-header">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title">Data Kehadiran</h4>
                    <button id="btnAddowKehadiran"  style="margin-left: 800px; display: none;"type="submit" class="btn btn-primary" onclick="window.location.href='/owform_admin'">Tambah</button>
                    <button id="btnAddkehadiran"  style="margin-left: 750px; display:none;"type="submit" class="btn btn-primary" onclick="window.location.href='/form_admin'">Tambah</button>
                    <script>
                        var type = '<?php echo $_SESSION['type']; ?>'
                        if (type == 2) {
                            var btnAdd = document.getElementById("btnAddowKehadiran")
                            btnAdd.style.display = 'block'
                        } else {
                            var btnAdd = document.getElementById("btnAddkehadiran")
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
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="table-data">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Waktu</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <script>
                                        var tokenSession = '<?php echo $_SESSION['token']; ?>';
                                        var token = "Bearer" + " " + tokenSession;
                                        var myArray = [];
                                        var tablePaket = document.getElementById("tabel-data");
                                        const url = "https://api.klubaderai.com/api/kehadiran";
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
                                                        body += "<td>" + data.nama + "</td>";
                                                        body += "<td>" + data.email + "</td>";
                                                        body += "<td>" + data.waktu + "</td>";
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
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
    <footer class="footer">
        <div class="container-fluid clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2022. All Rights Reserved</span>
        </div>
    </footer>
    <!-- partial -->
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- <script>
        var tokenSession = '<?php echo $_SESSION['token']; ?>';
        var token = "Bearer" + " " + tokenSession;

        var myArray = [];
        var tableKehadiran = document.getElementById("tableKehadiran");
        const url = "https://api.klubaderai.com/api/kehadiran";

        $.ajax({
            method: "GET",
            url: url,
            headers: {
                "Authorization": token,
            },
            success: function(response) {
                myArray = response.data;
                buildTable(myArray);
                console.log(myArray);
            },
        });

        function buildTable(data) {
            for (var i = 0; i < data.length; i++) {
                var row = `<tr data-id=${data[i].id}>
			    <td>${data[i].id}</td>
			    <td>${data[i].nama}</td>
                <td>${data[i].email}</td>
                <td>${data[i].waktu}</td>
                <td>
                    <button class="button-29" role="button">Update</button>
                    <button id="deleteMember" class="button-30" role="button">Delete</button>
                </td>
			</tr>`;
                tableKehadiran.innerHTML += row;
            }
        }

        tableKehadiran.addEventListener("click", (e) => {
            e.preventDefault();
            let deleteButtonisPressed = e.target.id == "deleteMember";

            var myHeaders = new Headers();
            myHeaders.append(
                "Authorization",
                token
            );
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