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
        <div class="padding" style="padding: 3rem !important;">
            <div class="row container d-flex justify-content-center">
                <div class="col-xl-6 col-md-12">
                    <div class="card user-card-full">
                        <div class="row m-l-0 m-r-0">
                            <div class="col-sm-4 bg-c-lite-green user-profile" style="background-image:url(/assets/images/BGPhoto.png); background-size:autopx;  background-repeat: no-repeat;">
                                <div class="card-block text-center text-white">
                                    <div id="img" style="margin-top:35px" class="m-b-25">

                                    </div>
                                    <p id="nameadmin" style="padding-top: 10px;"></p>
                                    <p id="admin" style=" display:block; font-family: 'Open Sans', sans-serif;font-family: 'Righteous', cursive;font-family: 'Roboto Slab', serif;background: linear-gradient(to right, yellow,white);-webkit-background-clip:text;
                                      -webkit-text-fill-color: transparent;font-size:20px;">Admin</p>
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
                                        <div class="col-sm-6">
                                            <p id="gender" class="m-b-10 f-w-600">Gender</p>
                                        </div>
                                    </div>
                                    <div class="buttonupdate">
                                        <button id="EPAdmin" style=" display: block; margin-left: 345px; margin-top:70px" class="btn btn-inverse-info btn-fw" onclick="window.location.href='/metland/editprofile-admin'">Edit Profile</button>

                                    </div>
                                    <div class="buttoncp">
                                        <button id="CPAdmin" style="display: block; float:right; margin-top: -29px; " class="btn btn-inverse-warning btn-fw" onclick="window.location.href='/metland/changepass-admin'">Change Password</button>

                                    </div>
                                </div>
                            </div>
                            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                            <script>
                                var myArray = [];
                                var tokenSession = '<?php echo $_SESSION['token']; ?>';
                                var token = "Bearer" + " " + tokenSession;
                                var id = `<?php echo $_SESSION['id']; ?>`;
                                const url = "https://api.tms-klar.com/api/users" + "/" + id;

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

                                    img = "https://api.tms-klar.com" +
                                        data.img_path;

                                    name = data.name;
                                    pob = data.tempat_lahir;
                                    dob = data.tanggal_lahir;
                                    email = data.email;
                                    nohp = data.nohp;
                                    alamat = data.alamat;
                                    gender = data.gender;

                                    $(`<img src="${img}" style="width: 200px; height: 200px;" class="img-radius" alt="User-Profile-Image">`).appendTo('#img');
                                    $(`<h6 class="text-muted f-w-400">${email}</h6>`).appendTo('#email');
                                    $(`<h6 class="text-muted f-w-400">${pob}</h6>`).appendTo('#pob');
                                    $(`<h6 class="text-muted f-w-400">${dob}</h6>`).appendTo('#dob');
                                    $(`<h6 class="text-muted f-w-400">${nohp}</h6>`).appendTo('#nohp');
                                    $(`<h6 class="text-muted f-w-400">${alamat}</h6>`).appendTo('#alamat');
                                    $(`<h6 class="text-muted f-w-400">${gender}</h6>`).appendTo('#gender');
                                    $(` <h7 style="font-size: 40px;font-family: 'Open Sans', sans-serif;font-family: 'Righteous', cursive;font-family: 'Roboto Slab', serif;background: linear-gradient(to right, yellow,white);-webkit-background-clip:text;
                                      -webkit-text-fill-color: transparent;">${name}</h7></br>`).appendTo('#nameadmin');

                                }
                            </script>
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