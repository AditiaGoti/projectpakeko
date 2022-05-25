<link rel="stylesheet" href="../../../../public/assets/css/shared/notice.css">

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row page-title-header">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title">Dashboard</h4>
                </div>
            </div>
        </div>
        <div id="status" class="col-14">


        </div>
        <div class="row">
            <div id="qrrow" class="col-lg-6 grid-margin stretch-card ">
                <div class="card text-center">
                    <div class="card-header">
                        QR-Code
                    </div>
                    <div id="fotoqr" class="card-body">
                        <svg>
                            <g id="qrcode" />
                        </svg>
                    </div>
                </div>
            </div>
            <div id="table-row" class="col-lg-6 grid-margin stretch-card">
                <div class="card text-center">
                    <div class="card-header">
                        Riwayat Kehadiran
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table-data" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Lokasi</th>
                                        <th>Hari</th>
                                        <th>Tanggal</th>
                                        <th>Waktu </th>
                                    </tr>
                                </thead>
                                <tbody id="tableMemberK">
                                    <script>
                                        const loader = document.querySelector("#loading");

                                        function displayLoading() {
                                            loader.classList.add("loading");
                                            setTimeout(() => {
                                                loader.classList.remove("loading");
                                            }, 8000);
                                        }
                                        displayLoading()

                                        function hideLoading() {
                                            loader.classList.remove("loading");
                                        }
                                        var tokenSession = '<?php echo $_SESSION['token']; ?>';
                                        var token = "Bearer" + " " + tokenSession;
                                        var Sid = '<?php echo $_SESSION['id']; ?>';
                                        var myArray = [];
                                        var tablePaket = document.getElementById("tabel-data");
                                        const url = "https://metland.tms-klar.com/api/kehadiran" + "/" + Sid;
                                        var qrcode = new QRCode(document.getElementById("fotoqr"), {
                                            useSVG: true,
                                        });

                                        function makeCode() {
                                            var Sid = '<?php echo $_SESSION['id']; ?>';
                                            var local = '<?php echo $_SESSION['local']; ?>';
                                            qrcode.makeCode(Sid + "-" + local);
                                        }

                                        $(document).ready(function() {
                                            $.ajax({
                                                method: "GET",
                                                url: url,
                                                headers: {
                                                    Authorization: token,
                                                },
                                                success: function(response) {
                                                    makeCode(myArray);
                                                    hideLoading()
                                                    data = response.data;
                                                    user_data = response.user_data;
                                                    dl = user_data.days_left;
                                                    left = dl.split(" ")

                                                    var hari = left[5]
                                                    var bulan = left[2] * 31
                                                    var tahun = left[0] * 365
                                                    var sisa = tahun + bulan + hari

                                                    if (sisa == 0) {
                                                        $('<div class="notice notice-danger">' +
                                                            ` <strong>Welcome, ${data[0].nama} </strong>` +
                                                            ` <h6>Sisa Membership: ${dl} </h6></div>`).show().prependTo('#status');
                                                    } else if ((sisa >= 1) && (sisa <= 6)) {
                                                        $('<div class="notice notice-warning">' +
                                                            ` <strong>Welcome, ${data[0].nama} </strong>` +
                                                            ` <h6>Sisa Membership: ${dl} </h6></div>`).show().prependTo('#status');
                                                    } else if (sisa >= 7) {
                                                        $('<div class="notice notice-success">' +
                                                            ` <strong>Welcome, ${data[0].nama} </strong>` +
                                                            ` <h6>Sisa Membership: ${dl} </h6></div>`).show().prependTo('#status');
                                                    }

                                                    $.each(data, function(i, data) {
                                                        const d = data.waktu;
                                                        const weekday = ["Minggu", "Senin", "Selama", "Rabu", "Kamis", "Jumat", "Sabtu"];
                                                        let day = weekday[new Date(d.replace(/-/g, "/")).getDay()];
                                                        let time = new Date(d.replace(/-/g, "/")).toLocaleTimeString("id-ID");
                                                        let date = new Date(d.replace(/-/g, "/")).toLocaleDateString("id-ID");


                                                        var body = `<tr>`;
                                                        body += `<td >` + data.local + "</td>";
                                                        body += `<td >` + day + "</td>";
                                                        body += "<td>" + date + "</td>";
                                                        body += "<td>" + time + " WIB" + "</td>";
                                                        body += "</tr>";
                                                        $("#table-data tbody").append(body);
                                                    });
                                                    /*DataTables instantiation.*/
                                                    var t = $("#table-data").DataTable({
                                                        responsive: true,
                                                        "pageLength": 25,
                                                        ordering: false,
                                                    });

                                                },
                                                error: function(response) {
                                                    hasil = response.responseJSON.message;
                                                    alert(hasil);
                                                }
                                            });

                                        })
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