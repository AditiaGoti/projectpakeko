<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="owprofile" class="nav-link">
                <div class="profile-image">
                    <img class="img-xs rounded-circle" src="assets/images/faces/face8.jpg" alt="profile image">
                    <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                    <p class="profile-name"><?php echo $_SESSION['name'] ?></p>
                    <p class="designation"><?php echo $_SESSION['email'] ?></p>
                </div>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/owner">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title" style="color: black;">Dashboard</span>
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
                        <a class="nav-link" href="/owalladmin">Semua Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/owform_admin">Tambah Admin</a>
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
                        <a class="nav-link" href="/owall_member">Semua Member</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/owactive_member">Active Member</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/owinactive_member">Inactive Member</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/owform_member">Tambah Member</a>
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
                        <a class="nav-link" href="/owkehadiran">Semua Kehadiran</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/owform_kehadiran">Tambah Kehadiran</a>
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
                        <a class="nav-link" href="/owtransaksi">Semua Transaksi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/owform_transaksi">Tambah Transaksi</a>
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
                        <a class="nav-link" href="/owpaket">Semua Paket</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/owform_paket">Tambah Paket</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/owner">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title" style="color: black;">Logout</span>
            </a>
        </li>
    </ul>
</nav>