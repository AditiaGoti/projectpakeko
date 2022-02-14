        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row page-title-header">
                    <div class="col-12">
                        <div class="page-header">
                            <h4 class="page-title">Package Data</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Paket</th>
                                                    <th>Harga</th>
                                                    <th>Created By</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tablePaket">

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
        <script>
            var tokenSession = '<?php echo $_SESSION['token']; ?>';
            var token = "Bearer" + " " + tokenSession;

            var myArray = [];
            var tablePaket = document.getElementById("tablePaket");
            const url = "https://api.klubaderai.com/api/pakets";

            $.ajax({
                method: "GET",
                url: url,
                headers: {
                    Authorization: token,
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
			    <td>${data[i].paket}</td>
                <td>${data[i].harga}</td>
                <td>${data[i].createdby}</td>
                <td>
                    <button id="updateMember" class="button-29" role="button">Update</button>
                    <button id="deleteMember" class="button-30" role="button">Delete</button>
                </td>
			</tr>`;
                    tablePaket.innerHTML += row;
                }
            }

            tablePaket.addEventListener("click", (e) => {
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

            tablePaket.addEventListener("click", (e) => {
                e.preventDefault();
                let deleteButtonisPressed = e.target.id == "updateMember";
                id = e.target.parentElement.parentElement.dataset.id;
                var getInput = id;
                localStorage.setItem("idPaket", id);
                window.location.href = '/transaksi';
                // var myHeaders = new Headers();
                // myHeaders.append(
                //     "Authorization",
                //     token
                // );
                // var deleteRequest = {
                //     method: "Delete",
                //     headers: myHeaders,
                //     redirect: "follow",
                // };


                // if (deleteButtonisPressed) {
                //     fetch(`${url}/${id}`, deleteRequest)
                //         .then((res) => res.json())
                //         .then(location.reload());
                // }
            });
        </script>