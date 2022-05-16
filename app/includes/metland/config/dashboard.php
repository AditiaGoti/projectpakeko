<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
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
            <div class=" col-xl-2 col-lg-6 mb-4" onclick="window.location='/Metland/transaksi';">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div id="sumTransaksi" class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Transaksi</h5>

                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                                    <i class="fa fa-money"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-6 " onclick="window.location='/Metland/transaksi';">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div id="sumTransaksiBulan" class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Transaksi Bulan Ini</h5>

                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                    <i class="fa fa-money"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-6 mb-4" onclick="window.location='/Metland/allmember';">
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
            <div class="col-xl-2 col-lg-6 mb-4" onclick="window.location='/Metland/allmember';">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div id="sumMemberBulan" class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Member Bulan Ini</h5>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                    <i class="fa fa-users"></i>
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
                        <canvas id="kehadiranChart" height="200"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="p-4 border-bottom bg-light">
                        <h4 class="card-title mb-0">Member Baru</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="memberChart" height="200"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="p-4 border-bottom bg-light">
                        <h4 class="card-title mb-0">Nominal Transaksi</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="transaksiChart" height="200"></canvas>
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
    <script>
        var tokenSession = '<?php echo $_SESSION['token']; ?>';
        var token = "Bearer" + " " + tokenSession;
        var myArray = [];
        var sumTransaksi = document.getElementById("sumTransaksi");
        var sumTransaksi = document.getElementById("sumMember");
        const urlt = "https://metland.tms-klar.com/api/transaksi";
        const urlm = "https://metland.tms-klar.com/api/users";
        const urlk = "https://metland.tms-klar.com/api/kehadiran";
        $(document).ready(function() {
            $.ajax({
                method: "GET",
                url: urlt,
                headers: {
                    Authorization: token,
                },
                success: function(response) {
                    data = response.etc;
                    const obj = data.rupiah_permonth;
                    const lastKey = Object.keys(obj).pop();
                    const TransaksiBulan = obj[lastKey];
                    rp = JSON.stringify(data.rupiah_permonth);
                    var dataT = JSON.parse(rp);
                    var values = [];
                    for (var i in dataT)
                        values.push(dataT[i]);

                    buildData(data);
                    buildDataTransaksi(data);
                    chartTransaksi(data);

                    function buildData(data) {
                        var bilangan = data.total_rupiah;
                        var reverse = bilangan.toString().split('').reverse().join(''),
                            ribuan = reverse.match(/\d{1,3}/g);
                        ribuan = ribuan.join('.').split('').reverse().join('');

                        var body = `<span class="h2 font-weight-bold mb-0">` + "Rp. " + ribuan + `</span>`;
                        $("#sumTransaksi").append(body);
                    };

                    function buildDataTransaksi(data) {
                        var bilangan = TransaksiBulan;
                        var reverse = bilangan.toString().split('').reverse().join(''),
                            ribuan = reverse.match(/\d{1,3}/g);
                        ribuan = ribuan.join('.').split('').reverse().join('');

                        var body = `<span class="h2 font-weight-bold mb-0">` + "Rp. " + ribuan + `</span>`;
                        $("#sumTransaksiBulan").append(body);
                    };

                    function chartTransaksi(data) {

                        const labels = [
                            'January',
                            'February',
                            'March',
                            'April',
                            'May',
                            'June',
                            'Juli',
                            'Agustus',
                            'September',
                            'Oktober',
                            'November',
                            'Desember',
                        ];

                        const datasets = {
                            labels: labels,
                            datasets: [{
                                label: 'Transaksi',
                                backgroundColor: 'rgb(253, 89, 1, 0.5)',
                                borderColor: 'rgb(253, 89, 1)',
                                borderWidth: 2,
                                borderRadius: 5,
                                borderSkipped: false,
                                data: values

                            }]
                        };

                        const config = {
                            type: 'bar',
                            data: datasets,
                            options: {
                                responsive: true,
                                plugins: {
                                    legend: {
                                        position: 'top',
                                    },
                                    title: {
                                        display: true,
                                    }
                                }
                            },
                        };
                        const myChart = new Chart(
                            document.getElementById('transaksiChart'),
                            config
                        );
                    }
                },
                error: function() {
                    alert('Terjadi Kesalahan');

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

                    const obj = data.user_data_permonth;
                    const lastKey = Object.keys(obj).pop();
                    const userBulan = obj[lastKey];

                    udp = JSON.stringify(data.user_data_permonth);
                    var dataM = JSON.parse(udp);
                    var values = [];
                    for (var i in dataM)
                        values.push(dataM[i]);
                    buildData(data);
                    buildDataBulan(data);
                    chartMember(data);

                    function buildData(data) {
                        var body = `<span class="h2 font-weight-bold mb-0">` + data.total_member + " Orang" + `</span>`;
                        $("#sumMember").append(body);
                    };

                    function buildDataBulan(data) {
                        var body = `<span class="h2 font-weight-bold mb-0">` + userBulan + " Orang" + `</span>`;
                        $("#sumMemberBulan").append(body);
                    };

                    function chartMember(data) {

                        const labels = [
                            'January',
                            'February',
                            'March',
                            'April',
                            'May',
                            'June',
                            'Juli',
                            'Agustus',
                            'September',
                            'Oktober',
                            'November',
                            'Desember',
                        ];

                        const datasets = {
                            labels: labels,
                            datasets: [{
                                label: 'Member',
                                backgroundColor: 'rgb(250, 171, 54, 0.5)',
                                borderColor: 'rgb(250, 171, 54)',
                                borderWidth: 2,
                                borderRadius: 5,
                                borderSkipped: false,
                                data: values

                            }]
                        };

                        const config = {
                            type: 'bar',
                            data: datasets,
                            options: {
                                responsive: true,
                                plugins: {
                                    legend: {
                                        position: 'top',
                                    },
                                    title: {
                                        display: true,
                                    }
                                }
                            },
                        };
                        const myChart = new Chart(
                            document.getElementById('memberChart'),
                            config
                        );
                    }
                },
                error: function() {
                    alert('Terjadi Kesalahan');

                }
            });

        });
        $(document).ready(function() {
            $.ajax({
                method: "GET",
                url: urlk,
                headers: {
                    Authorization: token,
                },
                success: function(response) {
                    data = response.etc;
                    tk = JSON.stringify(data.total_kehadiranperbulan);
                    var dataK = JSON.parse(tk);
                    var values = [];
                    for (var i in dataK)
                        values.push(dataK[i]);
                    chartKehadiran(data);

                    function chartKehadiran(data) {

                        const labels = [
                            'January',
                            'February',
                            'March',
                            'April',
                            'May',
                            'June',
                            'Juli',
                            'Agustus',
                            'September',
                            'Oktober',
                            'November',
                            'Desember',
                        ];

                        const datasets = {
                            labels: labels,
                            datasets: [{
                                label: 'Kehadiran',
                                backgroundColor: 'rgb(0, 128, 131, 0.5)',
                                borderColor: 'rgb(0, 128, 131)',
                                borderWidth: 2,
                                borderRadius: 5,
                                borderSkipped: false,
                                data: values

                            }]
                        };

                        const config = {
                            type: 'bar',
                            data: datasets,
                            options: {
                                responsive: true,
                                plugins: {
                                    legend: {
                                        position: 'top',
                                    },
                                    title: {
                                        display: true,
                                    }
                                }
                            },
                        };
                        const myChart = new Chart(
                            document.getElementById('kehadiranChart'),
                            config
                        );
                    }
                },
                error: function() {
                    alert('Terjadi Kesalahan');

                }
            });

        });

        //   chart
    </script>

    <!-- partial -->
</div>