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
                            <div class="col-sm-4 bg-c-lite-green user-profile">
                                <div class="card-block text-center text-white">
                                    <div id="img" class="m-b-25">

                                    </div>
                                    <h7 style="font-size: 30px; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;" class="f-w-600"><?php echo $_SESSION['name'] ?></h7>
                                    <p id="member" style="display:none; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; size:15px;">Member</p>
                                    <p id="admin" style=" display:none; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; size:15px;">Admin</p>
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
                                            <p class="m-b-10 f-w-600">Tinggi</p>
                                            <h6 class="text-muted f-w-400">160cm</h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Berat</p>
                                            <h6 class="text-muted f-w-400">60kg</h6>
                                        </div>
                                        <div class="buttonupdate">
                                            <button id="EPAdmin" style=" display: none;margin-left:200px; margin-top:10px;" class="btn btn-inverse-info btn-fw" onclick="window.location.href='/editprofile-admin'">Edit Profile</button>
                                            <button id="EPMember" style=" display: none;margin-left:200px; margin-top:10px;" class="btn btn-inverse-info btn-fw" onclick="window.location.href='/editprofile-member'">Edit Profile</button>
                                            <button id="CPAdmin" style="display: none; margin-left:200px; margin-top:10px;" class="btn btn-inverse-warning btn-fw" onclick="window.location.href='/changepass-admin'">Change Password</button>
                                            <button id="CPMember" style="display: none; margin-left:200px; margin-top:10px;" class="btn btn-inverse-warning btn-fw" onclick="window.location.href='/changepass-member'">Change Password</button>
                                        </div>
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