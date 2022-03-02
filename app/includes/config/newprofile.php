<style>
    h6 {
        font-size: 14px
    }

    .card .card-block p {
        line-height: 25px
    }
</style>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row page-title-header">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title">Profile</h4>
                </div>
            </div>
        </div>
        <div class="padding" style="padding: 3rem !important; ">
            <div class="row container d-flex justify-content-center">
                <div class="col-xl-6 col-md-12">
                    <div class="card user-card-full">
                        <div class="row m-l-0 m-r-0">
                            <div class="col-sm-4 bg-c-lite-green user-profile" style="background-image:url(assets/images/BGProfile.png); background-size:339px;  background-repeat:repeat-x;">
                                <div class="card-block text-center text-white">
                                    <div id="img" class="m-b-25" style="margin-top:25px">

                                    </div>
                                    <h7 style="font-size: 40px;font-family: 'Open Sans', sans-serif;font-family: 'Righteous', cursive;font-family: 'Roboto Slab', serif;background: linear-gradient(to right, yellow,white);-webkit-background-clip:text;
                                      -webkit-text-fill-color: transparent;" class="f-w-600"><?php echo $_SESSION['name'] ?></h7>
                                    <p id="member" style="display:none; font-family: 'Open Sans', sans-serif;font-family: 'Righteous', cursive;font-family: 'Roboto Slab', serif; font-size:20px; background: linear-gradient(to right, yellow,white);-webkit-background-clip:text;
                                      -webkit-text-fill-color: transparent;font-style: italic;">Member</p>
                                    <p id="admin" style=" display:none; font-family: 'Open Sans', sans-serif;font-family: 'Righteous', cursive;font-family: 'Roboto Slab', serif; font-size:20px;  background: linear-gradient(to right, yellow,white);-webkit-background-clip:text;
                                      -webkit-text-fill-color: transparent; font-style: italic;">Admin</p>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="card-block" style="padding: 1.25rem;">
                                    <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p id="email" class="m-b-10 f-w-600">Email</p>
                                        </div>
                                        <div class="col-sm-6">
                                            <p id="pob" class="m-b-10 f-w-600">Place of Birth</p>
                                        </div>
                                        <div class="col-sm-6">
                                            <p id="dob" class="m-b-10 f-w-600">Date Of birth</p>
                                        </div>
                                        <div class="col-sm-6">
                                            <p id="nohp" class="m-b-10 f-w-600">Phone Number</p>
                                        </div>
                                        <div class="col-sm-6">
                                            <p id="alamat" class="m-b-10 f-w-600">Address</p>
                                        </div>


                                    </div>
                                    <div class="buttonupdate">
                                        <button id="EPAdmin" style=" display: none; margin-left: 340px; margin-top: 40px;" class="btn btn-inverse-info btn-fw" onclick="window.location.href='/editprofile-admin'">Edit Profile</button>
                                        <button id="EPMember" style=" display: none; margin-left: 340px;  margin-top: 40px;" class="btn btn-inverse-info btn-fw" onclick="window.location.href='/editprofile-member'">Edit Profile</button>
                                    </div>
                                    <div class="buttoncp">
                                        <button id="CPAdmin" style="display: none; float:right; margin-top: -29px;" class="btn btn-inverse-warning btn-fw" onclick="window.location.href='/changepass-admin'">Change Password</button>
                                        <button id="CPMember" style="display: none;float:right; margin-top: -29px;" class="btn btn-inverse-warning btn-fw" onclick="window.location.href='/changepass-member'">Change Password</button>
                                    </div>
                                </div>
                            </div>
                            <script>
                                var type = '<?php echo $_SESSION['type']; ?>'
                                if (type == 1) {
                                    var admin = document.getElementById("admin")
                                    var epadmin = document.getElementById("EPAdmin")
                                    var cpadmin = document.getElementById("CPAdmin")
                                    admin.style.display = 'block'
                                    epadmin.style.display = 'block'
                                    cpadmin.style.display = 'block'

                                } else {
                                    var member = document.getElementById("member")
                                    var epmember = document.getElementById("EPMember")
                                    var cpmember = document.getElementById("CPMember")
                                    member.style.display = 'block'
                                    epmember.style.display = 'block'
                                    cpmember.style.display = 'block'
                                }
                            </script>
                            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                            <script>
                                var myArray = [];
                                var tokenSession = '<?php echo $_SESSION['token']; ?>';
                                var token = "Bearer" + " " + tokenSession;
                                var id = `<?php echo $_SESSION['id']; ?>`;
                                const url = "https://api.klubaderai.com/api/users" + "/" + id;

                                $.ajax({
                                    method: "GET",
                                    url: url,
                                    headers: {
                                        Authorization: token
                                    },
                                    success: function(response) {
                                        myArray = response.data;
                                        build(myArray);
                                    },
                                });

                                function build(data) {

                                    img = "https://api.klubaderai.com" +
                                        data.img_path;

                                    name = data.name;
                                    pob = data.tempat_lahir;
                                    dob = data.tanggal_lahir;
                                    email = data.email;
                                    nohp = data.nohp;
                                    alamat = data.alamat;

                                    $(`<img src="${img}" style="width: 200px; height: 200px;" class="img-radius" alt="User-Profile-Image">`).appendTo('#img');
                                    $(`<h6 class="text-muted f-w-400">${email}</h6>`).appendTo('#email');
                                    $(`<h6 class="text-muted f-w-400">${pob}</h6>`).appendTo('#pob');
                                    $(`<h6 class="text-muted f-w-400">${dob}</h6>`).appendTo('#dob');
                                    $(`<h6 class="text-muted f-w-400">${nohp}</h6>`).appendTo('#nohp');
                                    $(`<h6 class="text-muted f-w-400">${alamat}</h6>`).appendTo('#alamat');
                                }
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="p-4 border-bottom bg-light">
                    <h4 class="card-title mb-0">Progress</h4>
                </div>
                <div class="card-body">
                    <canvas id="kgChart" height="100"></canvas>
                    <script>
                        var tokenSession = '<?php echo $_SESSION['token']; ?>';
                        var token = "Bearer" + " " + tokenSession;
                        var myArray = [];


                        $(document).ready(function() {
                            $.ajax({
                                method: "GET",
                                url: urlt,
                                headers: {
                                    Authorization: token,
                                },
                                success: function(response) {
                                    data = response.data;
                                    bf = JSON.stringify(data.body_fat);
                                    w = JSON.stringify(data.weight);
                                    lm = JSON.stringify(data.leanmass);
                                    fm = JSON.stringify(data.fatmass);
                                    var databf = JSON.parse(bf);
                                    var dataw = JSON.parse(w);
                                    var datalm = JSON.parse(lm);
                                    var datafm = JSON.parse(fm);

                                    var arraybf = [];
                                    for (var i in databf)
                                        arraybf.push(databf[i]);

                                    var arrayw = [];
                                    for (var i in dataw)
                                        arrayw.push(dataw[i]);

                                    var arraylm = [];
                                    for (var i in datalm)
                                        arraylm.push(datalm[i]);

                                    var arrayfm = [];
                                    for (var i in datafm)
                                        arrayfm.push(datafm[i]);

                                    chartTransaksi(data);

                                    function chartTransaksi(data) {

                                        const labels = [
                                            '1',
                                            '2',
                                            '3',
                                            '4',
                                            '5',
                                        ];

                                        const datasets = {
                                            labels: labels,
                                            datasets: [{
                                                label: 'Weight',
                                                backgroundColor: 'rgb(154, 220, 255, 0.5)',
                                                borderColor: 'rgb(154, 220, 255)',
                                                borderWidth: 2,
                                                borderRadius: 5,
                                                borderSkipped: false,
                                                data: arrayw

                                            }, {
                                                label: 'Leanmass',
                                                backgroundColor: 'rgb(255, 248, 154, 0.5)',
                                                borderColor: 'rgb(255, 248, 154)',
                                                borderWidth: 2,
                                                borderRadius: 5,
                                                borderSkipped: false,
                                                data: arraylm

                                            }, {
                                                label: 'Fatmass',
                                                backgroundColor: 'rgb(255, 178, 166, 0.5)',
                                                borderColor: 'rgb(255, 178, 166)',
                                                borderWidth: 2,
                                                borderRadius: 5,
                                                borderSkipped: false,
                                                data: arrayfm

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
                                                        text: 'Chart.js Bar Chart'
                                                    }
                                                }
                                            },
                                        };
                                        const myChart = new Chart(
                                            document.getElementById('kgChart'),
                                            config
                                        );
                                    }
                                },
                                error: function() {
                                    alert('Terjadi Kesalahan');

                                }
                            });

                        });
                    </script>
                </div>
                <div class="card-body">
                    <canvas id="gChart" height="100"></canvas>
                    <script>
                        var tokenSession = '<?php echo $_SESSION['token']; ?>';
                        var token = "Bearer" + " " + tokenSession;
                        var myArray = [];

                        const urlt = "https://api.klubaderai.com/api/users-progress";
                        $(document).ready(function() {
                            $.ajax({
                                method: "GET",
                                url: urlt,
                                headers: {
                                    Authorization: token,
                                },
                                success: function(response) {
                                    data = response.data;
                                    bf = JSON.stringify(data.body_fat);
                                    w = JSON.stringify(data.weight);
                                    lm = JSON.stringify(data.leanmass);
                                    fm = JSON.stringify(data.fatmass);
                                    var databf = JSON.parse(bf);
                                    var dataw = JSON.parse(w);
                                    var datalm = JSON.parse(lm);
                                    var datafm = JSON.parse(fm);

                                    var arraybf = [];
                                    for (var i in databf)
                                        arraybf.push(databf[i]);

                                    var arrayw = [];
                                    for (var i in dataw)
                                        arrayw.push(dataw[i]);

                                    var arraylm = [];
                                    for (var i in datalm)
                                        arraylm.push(datalm[i]);

                                    var arrayfm = [];
                                    for (var i in datafm)
                                        arrayfm.push(datafm[i]);

                                    chartTransaksi(data);

                                    function chartTransaksi(data) {

                                        const labels = [
                                            '1',
                                            '2',
                                            '3',
                                            '4',
                                            'Now',
                                        ];

                                        const datasets = {
                                            labels: labels,
                                            datasets: [{
                                                label: 'Weight',
                                                backgroundColor: 'rgb(255, 138, 174, 0.5)',
                                                borderColor: 'rgb(255, 138, 174)',
                                                borderWidth: 2,
                                                borderRadius: 5,
                                                borderSkipped: false,
                                                data: arraybf

                                            }]
                                        };

                                        const config = {
                                            type: 'line',
                                            data: datasets,
                                            options: {
                                                responsive: true,
                                                plugins: {
                                                    legend: {
                                                        position: 'top',
                                                    },
                                                    title: {
                                                        display: true,
                                                        text: 'Chart.js Bar Chart'
                                                    }
                                                },
                                                scales: {
                                                    yAxes: [{
                                                        ticks: {
                                                            beginAtZero: true,
                                                            min: 0,
                                                            max: 100,
                                                            stepSize: 20,
                                                        }
                                                    }]
                                                }
                                            },
                                        };
                                        const myChart = new Chart(
                                            document.getElementById('gChart'),
                                            config
                                        );
                                    }
                                },
                                error: function() {
                                    alert('Terjadi Kesalahan');

                                }
                            });

                        });
                    </script>
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