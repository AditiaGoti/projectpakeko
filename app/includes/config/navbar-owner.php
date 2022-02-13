        <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
                <a class="navbar-brand brand-logo" href="/owner" style="margin-top: -80px; width: 230px; padding: 3px;">
                    <img src="assets/images/aderai.png" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="/owner">
                    <img src="assets/images/logoo.png" alt="logo" />
                </a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
                        <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                            <img class="img-xs rounded-circle" src="assets/images/faces/face8.jpg" alt="Profile image"> </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                            <div class="dropdown-header text-center">
                                <img class="img-md rounded-circle" src="assets/images/faces/face8.jpg" alt="Profile image">
                                <p class="mb-1 mt-3 font-weight-semibold">Alsi</p>
                                <p class="font-weight-light text-muted mb-0">syahrulhusna@gmail.com</p>
                            </div>
                            <a href="/profile" class="dropdown-item">My Profile <span class="badge badge-pill badge-danger"></span><i class="dropdown-item-icon ti-dashboard"></i></a>
                            <a onclick="logout()" class="dropdown-item">Sign Out<i class="dropdown-item-icon ti-power-off"></i></a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>

        <script>
            function logout() {
                var tokenSession = '<?php echo $_SESSION['token']; ?>';
                var token = "Bearer" + " " + tokenSession;
                var myHeaders = new Headers();
                myHeaders.append("Authorization", token);
                myHeaders.append("Content-Type", "application/x-www-form-urlencoded");
                var urlencoded = new URLSearchParams();

                var requestOptions = {
                    method: 'POST',
                    headers: myHeaders,
                    body: urlencoded,
                    redirect: 'follow'
                };

                fetch("https://api.klubaderai.com/api/logout", requestOptions)
                    .then(response => response.text())
                    .then(result => {
                        console.log(result)
                    })
                    .catch(error => console.log('error', error));
            }
        </script>