<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">

        <li class="nav-item nav-category" style="margin-top: 75px; color: black;">Klub Ade Rai Ragunan</li>
        <li class="nav-item">
            <a class="nav-link" href="/owner">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title" style="color: black;">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#kiw" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title" style="color: black;"> Admin List</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="kiw">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="/owner.alladmin">Semua Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/owner.form_admin">Tambah Admin</a>
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
                        <a class="nav-link" href="/owner.all_member">Semua Member</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/owner.active_member">Active Member</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/owner.inactive_member">Inactive Member</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/owner.form_member">Tambah Member</a>
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
                        <a class="nav-link" href="/owner.kehadiran">Semua Kehadiran</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/owner.form_kehadiran">Tambah Kehadiran</a>
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
                        <a class="nav-link" href="/owner.transaksi">Semua Transaksi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/owner.form_transaksi">Tambah Transaksi</a>
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
                        <a class="nav-link" href="/owner.paket">Semua Paket</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/owner.form_paket">Tambah Paket</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" onclick="logout()">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title" style="color: black;">Logout</span>
            </a>
        </li>
    </ul>
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