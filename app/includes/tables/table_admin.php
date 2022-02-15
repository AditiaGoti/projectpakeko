<div class="main-panel">
    <div class="content-wrapper">
        <div class="row page-title-header">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title">Data Admin</h4>
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
            <div class="col-xl-3 col-lg-6 mb-4">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Paket</h5>
                                <h5 class="card-title text-uppercase text-muted mb-0">1 Bulan</h5>
                                <span class="h2 font-weight-bold mb-0">100</span>
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
            <div class="col-xl-3 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Paket</h5>
                                <h5 class="card-title text-uppercase text-muted mb-0">3 Bulan</h5>
                                <span class="h2 font-weight-bold mb-0">100</span>
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
            <div class="col-xl-3 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Paket</h5>
                                <h5 class="card-title text-uppercase text-muted mb-0">6 Bulan</h5>
                                <span class="h2 font-weight-bold mb-0">100</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                    <i class="fas fa-percent"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Paket</h5>
                                <h5 class="card-title text-uppercase text-muted mb-0">12 Bulan</h5>
                                <span class="h2 font-weight-bold mb-0">100</span>
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
                                        <th onclick="sortTable('alfa',1)">Nama</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Email</th>
                                        <th>No. HP</th>
                                        <th>Alamat</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="tableAdmin">

                                </tbody>
                            </table>
                            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                            <script>
                                var myArray = [];
                                var tableAdmin = document.getElementById("tableAdmin");
                                const url = "https://api.klubaderai.com/api/admin   ";

                                $.ajax({
                                    method: "GET",
                                    url: url,
                                    headers: {
                                        Authorization: "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiNzA1MmM3MDdkOTc2Yjk2MjlhNDk2Y2U0ZTkzMWJhYWE3ZmEzYTM2MGRkM2E2OGNlYjQwNTNjMjY5ZGVmMDI1ZDBmYzc2NDIxYWUzMTcwMjAiLCJpYXQiOjE2NDQ2MDM4ODIuMzI1NTM2LCJuYmYiOjE2NDQ2MDM4ODIuMzI1NTM4LCJleHAiOjE2NzYxMzk4ODIuMzI0MTExLCJzdWIiOiIzNSIsInNjb3BlcyI6W119.u8BUFg9LGPD1OM06zTctTbTbvCE92dUwmODh2WiMKvKKJraRxIEGWs0jPJrhrLdTUk4ghvk8an2py6bNs2wMr8lrwtUjPiAW2r4wwR_sKsdb_ViK20Nm-3OCo-CW21rsgSHP3QmmN-R0YQlv8EBPktLXWn1Uu0tstPAah6hf6_EhYkmk5kOTnj2aaBrDGNcKdy9XD3yFjzGe1qjO1WLcG92ufbLeRj6ecaUsZY6HfuiWIqyq0dNUGIKFyYa07RlNtLQ84tQrP1gqvFNB7bL34p5H7zayAxZ6SVkes1LQo5CK_JXXdUjxUqA9lJ0v9jK5l-1OG1C84NDbiqi261Yd9zdy9UD_KXGBJXiZGUbZOaoZWH934a1Wa-Oh_lXiwMQA4wcux-oUF7gdE5fW2-wC7rCAGYFxxea3EHW1F6p1SJBYLcE7LhhcB84l51P02HBRLCMXog-LZBgA7gv1jDKRfcjDF6ypNxKZNvUNjCT12y0Eso9JFsFhfCXxAEPrBLwAZya8gWKyqqZMfRtLH3oQvgGzl_uD0vG7_LeFsNWG8ckubNHRwpPM4kdxQyxJ5qNh4ujgjFTyQm6uHHdVQwPF2ymhnXpMTWCCL_sEiY3h9WdJq9RlgcbB4SvyBmytkcdTslNcnDfAkERAYSOVn6uV7ci9SYHnJCnIh1upmG-sRI4",
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
			    <td>${data[i].name}</td>
                <td>${data[i].tempat_lahir}</td>
                <td>${data[i].tanggal_lahir}</td>
                <td>${data[i].email}</td>
                <td>${data[i].nohp}</td>
			    <td>${data[i].alamat}</td>
                <td>
                    <button class="button-29" role="button">Update</button>
                    <button id="deleteMember" class="button-30" role="button">Delete</button>
                </td>
			</tr>`;
                                        tableAdmin.innerHTML += row;
                                    }
                                }

                                tableAdmin.addEventListener("click", (e) => {
                                    e.preventDefault();
                                    let deleteButtonisPressed = e.target.id == "deleteMember";

                                    var myHeaders = new Headers();
                                    myHeaders.append(
                                        "Authorization",
                                        "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiYjQ0MTcwYWEyNmYyNTZlZjYxOWU5Mjg1N2I3MmI3Y2ZmMjlhZjYwMzFjNmExMGIwNTliODQzMTA2YjQwMTEzNzU1OTJjYTNiNGJhYWQ3NmEiLCJpYXQiOjE2NDQ0NzgxNTMuMTc4MjYsIm5iZiI6MTY0NDQ3ODE1My4xNzgyNjMsImV4cCI6MTY3NjAxNDE1My4xMTUyNjksInN1YiI6IjIxIiwic2NvcGVzIjpbXX0.WkvV1C-Fb7ForxHe1i8aN9g2KFwykVAZRNcabwQjsOvEQpzIQ91AJRSzIDq2zE9KtmSaJNOuiPsyf__Z14ogh1LyUAdzF9-N41O-NBrypSRelEK86iIo_OdYPsS7wNcmymrPIFgMq90lVHhHuUJYX6p-JL_DrgGOuvJarS2sLqn_Jb0JP-vK64ePuNKjPtJJWy3mAI_7V8LCAnl95j-YqCgkutxJXCqJ28K3vdEZ4R8TQhwDcWw2R2FmxNM3SJmnaPbi-ps20UC_SIjnyXsep1pg1eez9sO7q-l3RxvU32Zf4MUG5ksM_x-mtmFZZOV-A2gIJ7MzuvCUMPn6cFKnYrWdDan3WsGvx9N0gLlFIrXap5ZtlZpmjfREOJI5k91AN3u6N2n8fu9JBA5E0hGdWXi428sukmkxgQrBE2X89oxmWpuVUMjjNlRVeAFVyMbILNfflSMIN1tRSogkjE06hYYARWteRufmO2Ot313IUTnIY6Q1mn1JdmU6ZTaTmGnopvisK6GObcTtmgwSubIxQfQYmEFeCV2D030TRH_HR53LmQ-X3rOJochNMhM1rPH76Wdg6N_UVEySfSFnS8efec51PNurWE5Kx8laBuFfHb104RFevHW_t6VDxsafXvZ2mMzkZmq2Snvt1y7xTWjb5E9OAuV39HnRPbyfeV4lYqM"
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
                            </script>


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