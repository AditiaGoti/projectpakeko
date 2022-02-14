    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row page-title-header">
                <div class="col-12">
                    <div class="page-header">
                        <h4 class="page-title">Data Kehadiran</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="topnavv">
                                <div class="search-container">
                                    <input type="text" id="1" onkeyup="searchTable(1)" size="20" placeholder="Search" style="margin-left:700px;"></input>
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Waktu</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tableKehadiran">

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
    <script>
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

        // tableKehadiran.addEventListener("click", (e) => {
        //     e.preventDefault();
        //     let deleteButtonisPressed = e.target.id == "deleteMember";

        //     var myHeaders = new Headers();
        //     myHeaders.append(
        //         "Authorization",
        //         token
        //     );
        //     var deleteRequest = {
        //         method: "Delete",
        //         headers: myHeaders,
        //         redirect: "follow",
        //     };

        //     id = e.target.parentElement.parentElement.dataset.id;
        //     if (deleteButtonisPressed) {
        //         fetch(`${url}/${id}`, deleteRequest)
        //             .then((res) => res.json())
        //             .then(location.reload());
        //     }
        // });
    </script>