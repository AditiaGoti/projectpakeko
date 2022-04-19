<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="/cileungsi" class="nav-link">
                <div class="text-wrapper">
                    <p class="profile-name"> <i class="fa fa-user" style="margin-left: -10px; padding-right: 5px;"></i><?php echo $_SESSION['name'] ?></p>
                    <p class="designation"><i class="fa fa-envelope" style="margin-left: -11px;  padding-right: 3px;"></i><?php echo $_SESSION['email'] ?></p>
                </div>
            </a>
        </li>
        <li class="nav-item nav-category">Main Menu</li>
        <li class="nav-item">
            <a class="nav-link" href="/cileungsi/owner">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title" style="color: black;">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/cileungsi/owalladmin">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title" style="color: black;">Admin</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/cileungsi/owall_member">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title" style="color: black;">Member</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/cileungsi/owkehadiran">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title" style="color: black;">Kehadiran</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/cileungsi/owtransaksi">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title" style="color: black;">Transaksi</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/cileungsi/owpaket">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title" style="color: black;">Paket</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="/cileungsi/logout" class="nav-link">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title" style="color: black;">Logout</span>
            </a>
        </li>
    </ul>
</nav>