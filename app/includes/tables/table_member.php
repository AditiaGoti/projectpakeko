<div class="main-panel">
    <div class="content-wrapper">
        <div class="row page-title-header">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title">Data Member</h4>
                </div>
            </div>
        </div>
        <div class="header-body">
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
                            <h4 class="card-title">All Member</h4>
                            <div id="cover" style="margin-top: -60px;">
                                <form style="  height: 96px;" method="get" action="">
                                    <div class="tb">
                                        <div class="td"><input style=" width: 100%; height: 96px; font-size: 30px;
                                        line-height: 1;margin-top: -50px; float: right; color: black;" id="1" onkeyup="searchTable(1)" type="text" placeholder="Search" required></div>
                                        <div class="td" id="s-cover">
                                            <button style="position: relative; display: block; width: 5px; height: 5px;
                                            cursor: pointer; font-size: 10px;" type="submit">
                                                <div id="s-circle"></div>
                                                <span></span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="panel-body">
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
                                    <script type="text/javascript" src="assets/js/getAllMember.js"></script>
                                </div>
                            </div>
                        </div>
                        <!--  -->
                    </div>
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
    <script>
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