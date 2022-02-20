<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="/owner" style="margin-top: -5px; width: 230px; padding: 3px;">
            <img src="assets/images/aderaifix.png" alt="logo" /></a>
        <a class="navbar-brand brand-logo-mini" href="/owner">
            <img src="assets/images/logoo.png" alt="logo" />
        </a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center">
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>
<div class="container-fluid page-body-wrapper">
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item nav-profile">
                <a class="nav-link" href="/profile-member">
                    <div class="text-wrapper">
                        <p class="profile-name"><?php echo $_SESSION['name'] ?></p>
                        <p class="designation"><?php echo $_SESSION['email'] ?></p>
                    </div>
                </a>
            </li>
            <li class="nav-item nav-category">Main Menu</li>
            <li class="nav-item">
                <a class="nav-link" href="/member">
                    <i class="menu-icon typcn typcn-document-text"></i>
                    <span class="menu-title" style="color: black;">Dashboard</span>
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