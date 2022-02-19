        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row page-title-header">
                    <div class="col-12">
                        <div class="page-header">
                            <h4 class="page-title">Package Data
                                <button id="btnAddowPaket" style="float:right; margin-left:5px; display: none;" type="submit" class="btn btn-inverse-primary btn-sm" onclick="window.location.href='/owform_paket'">Tambah</button>
                                <button id="btnAddPaket" style="float:right; margin-left:5px; display: none;" type="submit" class="btn btn-inverse-primary btn-sm" onclick="window.location.href='/form_paket'">Tambah</button>
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
                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
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
                                            <tbody id="tablepaket">
                                                <script>
                                                    var tokenSession = '<?php echo $_SESSION['token']; ?>';
                                                    var token = "Bearer" + " " + tokenSession;
                                                    var myArray = [];
                                                    var tablePaket = document.getElementById("tablepaket");
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

                                                                    var body = `<tr data-id=${data.id} >`;
                                                                    body += "<td>" + data.id + "</td>";
                                                                    body += "<td>" + data.paket + "</td>";
                                                                    body += "<td>" + data.harga + "</td>";
                                                                    body += "<td>" + data.createdby + "</td>";
                                                                    body += "<td>" + `<button id="update" class="btn btn-warning" role="button"><i class=" fa fa-pencil"></i></button>` + " " + `<button id="delete" class="btn btn-danger" role="button"><i class="fa fa-trash"></i></button>` + "</td>";

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

                                                    tablePaket.addEventListener("click", (e) => {
                                                        e.preventDefault();
                                                        let deleteButtonisPressed = e.target.id == "delete";
                                                        let updateButtonisPressed = e.target.id == "update";

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
                                                        if (updateButtonisPressed) {
                                                            if (type == 2) {
                                                                var pakID = sessionStorage.setItem('id-paket', mid);
                                                                location.href = "/owformu_paket";
                                                            } else {
                                                                var pakID = sessionStorage.getItem('id-paket', mid);
                                                                location.href = "formu_paket";
                                                            }
                                                        }
                                                        if (deleteButtonisPressed) {
                                                            fetch(`${url}/${mid}`, deleteRequest)
                                                                .then((res) => res.json())
                                                                .then(location.reload());

                                                        }

                                                    });
                                                </script>
                                            </tbody>
<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">MESSAGE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <p>Apakah anda yakin ??</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
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