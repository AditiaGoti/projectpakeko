        <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
                <a class="navbar-brand brand-logo" href="index.html" style="width: 150px; ">
                    <img src="assets/images/logoo.png" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="index.html">
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
                            <a class="dropdown-item">My Profile <span class="badge badge-pill badge-danger"></span><i class="dropdown-item-icon ti-dashboard"></i></a>
                            <a class="dropdown-item">Sign Out<i class="dropdown-item-icon ti-power-off"></i></a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">

                <li class="nav-item nav-category" style="margin-top: 75px; color: black;">Klub Ade Rai Ragunan</li>
                <li class="nav-item">
                    <a class="nav-link" href="/">
                        <i class="menu-icon typcn typcn-document-text"></i>
                        <span class="menu-title" style="color: black;">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/laporan">
                        <i class="menu-icon typcn typcn-document-text"></i>
                        <span class="menu-title" style="color: black;">Laporan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#admin" aria-expanded="false" aria-controls="ui-basic">
                        <i class="menu-icon typcn typcn-coffee"></i>
                        <span class="menu-title" style="color: black;"> Admin List</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="admin">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="/alladmin">Semua Member</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/form_admin">Tambah Member</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#member" aria-expanded="false" aria-controls="ui-basic">
                        <i class="menu-icon typcn typcn-coffee"></i>
                        <span class="menu-title" style="color: black;"> Member List</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="member">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="/allmember">Semua Member</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/activemember">Active Member</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/inactivemember">Inactive Member</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/form_member">Tambah Member</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#kehadiran" aria-expanded="false" aria-controls="ui-basic">
                        <i class="menu-icon typcn typcn-coffee"></i>
                        <span class="menu-title" style="color: black;">Kehadiran</span>
                        <i class=" menu-arrow"></i>
                    </a>
                    <div class="collapse" id="kehadiran">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="/kehadiran">Semua Kehadiran</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/form_kehadiran">Tambah Kehadiran</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#transaksi" aria-expanded="false" aria-controls="ui-basic">
                        <i class="menu-icon typcn typcn-coffee"></i>
                        <span class="menu-title" style="color: black;"> Transaksi</span>
                        <i class=" menu-arrow"></i>
                    </a>
                    <div class="collapse" id="transaksi">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="/transaksi">Semua Transaksi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/form_transaksi">Tambah Transaksi</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#paket" aria-expanded="false" aria-controls="ui-basic">
                        <i class="menu-icon typcn typcn-coffee"></i>
                        <span class="menu-title" style="color: black;"> Package List</span>
                        <i class=" menu-arrow"></i>
                    </a>
                    <div class="collapse" id="paket">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="/tabel_paket">Semua Paket</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/form_paket">Tambah Paket</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>