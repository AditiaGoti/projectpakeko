<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="/Metland/member" style="margin-top: -5px; width: 230px; padding: 3px;">
            <img src="../../../../public/assets/images/aderaifix.png" alt="logo" /></a>
        <a class="navbar-brand brand-logo-mini" href="/Metland/member">
            <img src="../../../../public/assets/images/logoo.png" alt="logo" /></a>
        </a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav ml-auto">
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
        </ul>
    </div>
</nav>
<div class="container-fluid page-body-wrapper">
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item nav-profile">
                <a href="/profile-member" class="nav-link">
                    <div class="text-wrapper">
                        <p class="profile-name"> <i class="fa fa-user" style="margin-left: -10px; padding-right: 5px;"></i><?php echo $_SESSION['name'] ?></p>
                        <p class="designation"><i class="fa fa-envelope" style="margin-left: -11px;  padding-right: 3px;"></i><?php echo $_SESSION['email'] ?></p>
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
                <a href="/logout" class="nav-link">
                    <i class="menu-icon typcn typcn-document-text"></i>
                    <span class="menu-title" style="color: black;">Logout</span>
                </a>
            </li>
        </ul>
    </nav>