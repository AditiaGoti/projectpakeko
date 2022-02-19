<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="/" class="nav-link">
                <div class="text-wrapper">
                    <p class="profile-name">Hallo, <?php echo $_SESSION['name'] ?></p>
                    <p class="designation"><?php echo $_SESSION['email'] ?></p>
                </div>
            </a>
        </li>
        <li class="nav-item nav-category">Main Menu</li>
        <li class="nav-item">
            <a class="nav-link" href="/owner">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title" style="color: black;">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/owalladmin">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title" style="color: black;">Admin</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/owall_member">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title" style="color: black;">Member</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/owkehadiran">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title" style="color: black;">Kehadiran</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/owtransaksi">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title" style="color: black;">Transaksi</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/owpaket">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title" style="color: black;">Paket</span>
            </a>
        </li>
        <li class="nav-item">
            <a id="logoutBtn" href="/logout" class="nav-link" type="submit">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title" style="color: black;">Logout</span>
            </a>
        </li>
    </ul>
</nav>