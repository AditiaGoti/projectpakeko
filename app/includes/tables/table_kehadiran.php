<style>
    button {
  position: relative;
  display: block;
  width: 5px;
  height: 5px;
  cursor: pointer;
  font-size: 10px;
}
input[type="text"] {
  width: 100%;
  height: 96px;
  font-size: 30px;
  line-height: 1;
  margin-top: -50px;
  float: right;
  color: black;
}

input[type="text"]::placeholder {
  color: black;
}
form {
  height: 96px;
}
</style>
    <div class="main-panel">
            <div class="content-wrapper">
                <div class="row page-title-header">
                    <div class="col-12">
                        <div class="page-header">
                            <h4 class="page-title">Data Kehadiran</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Daftar Kehadiran</h4>
                                <br />
                                <div id="cover" style="margin-top: -50px; position:absolute;">
                            <form method="get" action="">
                                <div class="tb">
                                    <div class="td"><input id="1" onkeyup="searchTable(1)" type="text" placeholder="Search" required></div>
                                        <div class="td" id="s-cover">
                                            <button type="submit">
                                                <div id="s-circle"></div>
                                                    <span></span>
                                                        </button>
                                                    </div>
                                                                </div>
                                                                </form>
                                                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Email</th>
                                                    <th>Nama</th>
                                                    <th>Waktu Absen</th>
                                                    <th>Sisa Jam</th>
                                                    <th>Sisa Hari</th>
                                                    <th>Sisa Bulan</th>
                                                    <th>Sisa Tahun</th>
                                                    <th>Sisa Token</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>syahrulhusna@gmail.com</td>
                                                    <td>Syahrul Husna</td>
                                                    <td>1</td>
                                                    <td>1</td>
                                                    <td>1</td>
                                                    <td>1</td>
                                                    <td>1</td>
                                                    <td>1</td>
                                                    <td>   <button class="button-29" role="button">Update</button>
                                                    <button class="button-30" role="button">Update</button></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
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