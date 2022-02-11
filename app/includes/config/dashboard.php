<div class="main-panel">
    <div class="content-wrapper">
        <div class="row page-title-header">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title">Laporan</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class=" col-xl-2 col-lg-6 mb-4" onclick="window.location='/transaksi';">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Transaksi</h5>
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
            <div class="col-xl-2 col-lg-6" onclick="window.location='/allmember';">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Member</h5>
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
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="p-4 border-bottom bg-light">
                        <h4 class="card-title mb-0">Kunjungan Pelanggan</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="visitors-chart" height="100"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="p-4 border-bottom bg-light">
                        <h4 class="card-title mb-0">Member Baru</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="members-chart" height="100"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="p-4 border-bottom bg-light">
                        <h4 class="card-title mb-0">Nominal Transaksi</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="transactions-chart" height="100"></canvas>
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