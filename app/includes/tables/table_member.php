<div class="main-panel">
    <div class="content-wrapper">
        <div class="row page-title-header">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title">Data Member</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 mb-4">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Transaksi</h5>
                                <span class="h2 font-weight-bold mb-0">Rp. 1.000.000.000</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                    <i class="fas fa-chart-bar"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                            <table class="table table-striped table-bordered table-hover" id="table1">
                                <thead>
                                    <tr>
                                        <th onclick="sortTable('num',0)">#</th>
                                        <th onclick="sortTable('alfa',1)">Nama</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Email</th>
                                        <th>No. HP</th>
                                        <th>Alamat</th>
                                        <th>Expired</th>
                                        <th>Token</th>
                                        <th onclick="sortTable('date',3)">Tgl Bergabung</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="tableMember">

                                </tbody>
                            </table>
                            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                        </div>
                        <div class="pagination">
                            <a href="#">&laquo;</a>
                            <a class="active" href="#">1</a>
                            <a href="#">2</a>
                            <a href="#">3</a>
                            <a href="#">4</a>
                            <a href="#">5</a>
                            <a href="#">6</a>
                            <a href="#">&raquo;</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function searchTable(col) {
            var input, filter, table, tr, td, i;
            input = document.getElementById(col);
            filter = input.value.toUpperCase();
            table = document.getElementById("table1");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                if (col == '1') td = tr[i].getElementsByTagName("td")[1];
                else if (col == '3') td = tr[i].getElementsByTagName("td")[3];
                if (td) {
                    if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

        function sortTable(d, n) {
            var table, rows, col_header, switching, i, x, y, a, b, shouldSwitch, dir = "asc",
                switchcount = 0;
            table = document.getElementById("table1");
            rows = table.getElementsByTagName("tr");
            col_header = rows[0].getElementsByTagName("th")[n];
            switching = true;
            while (switching) {
                switching = false;
                for (i = 1; i < (rows.length - 1); i++) {
                    shouldSwitch = false;
                    x = rows[i].getElementsByTagName("td")[n];
                    y = rows[i + 1].getElementsByTagName("td")[n];
                    if (d == "num") {
                        a = Number(x.innerHTML);
                        b = Number(y.innerHTML);
                    } else if (d == "alfa") {
                        a = x.innerHTML.toLowerCase();
                        b = y.innerHTML.toLowerCase();
                    } else if (d == "date") {
                        a = Date.parse(x.innerHTML);
                        b = Date.parse(y.innerHTML);
                    }
                    if (dir == "asc") {
                        if (a > b) {
                            shouldSwitch = true;
                            break;
                        }
                    } else if (dir == "desc") {
                        if (a < b) {
                            shouldSwitch = true;
                            break;
                        }
                    }
                }
                if (shouldSwitch) {
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                    switchcount++;
                } else {
                    if (switchcount == 0 && dir == "asc") {
                        dir = "desc";
                        switching = true;
                    }
                }
            }
            resetHeader();
            if (dir == "asc") {
                col_header.textContent = headerCol[n] + " \u2191";
            }
            if (dir == "desc") {
                col_header.textContent = headerCol[n] + " \u2193";
            }
        }
    </script>
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
    var myArray = [];
    var tableMember = document.getElementById("tableMember");
    const url = "https://api.klubaderai.com/api/users";

    $.ajax({
        method: "GET",
        url: url,
        headers: {
            Authorization: token
        },
        success: function(response) {
            myArray = response.data;
            buildTable(myArray);
        },
    });

    function buildTable(data) {
        for (var i = 0; i < data.length; i++) {
            var row = `<tr data-id=${data[i].id}>
			    <td>${data[i].id}</td>
			    <td>${data[i].name}</td>
                <td>${data[i].tempat_lahir}</td>
                <td>${data[i].tanggal_lahir}</td>
                <td>${data[i].email}</td>
                <td>${data[i].nohp}</td>
			    <td>${data[i].alamat}</td>
                <td>${data[i].expired}</td>
                <td>${data[i].token}</td>
                <td></td>
                <td>
                    <button class="button-29" role="button">Update</button>
                    <button id="deleteMember" class="button-30" role="button">Delete</button>
                </td>
			</tr>`;
            tableMember.innerHTML += row;
        }
    }

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
</script>